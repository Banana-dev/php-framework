<?php
namespace Template\template;
class Tpl
{
    /** @var string Chemin du template */
    protected $filepath;
    /** @var string Contenu du template */
    protected $filecontent;
    /** @var string Contenu parsé */
    protected $content;
    /** @var array Variables assignées au template */
    protected $data = [];
    
    /**
     * Constructeur
     * Initialise le fichier à parser
     * 
     * @param string Chemin et nom du fichier template
     * @throws Exception Si le fichier n'existe pas
     */
    public function __construct($filename)
    {
        if (!is_file($filename))
        {
            throw new Exception($filename . ' is not a valid file');
        }
        $this->filepath = $filename;
    }
    
    /**
     * Assigne des données au template
     * Les données peuvent être des string, array, objets..
     * 
     * @param string Clé
     * @param string Valeur
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }
    
    /**
     * Retourne le contenu parsé
     * 
     * @return string Contenu parsé
     */
    public function output()
    {
        // Enclenche la temporisation de sortie
        ob_start();
        
        // On récupère le contenu du fichier
        $this->filecontent = $this->get_content($this->filepath);
        
        // Parsage du contenu
        $this->content = $this->parse($this->filecontent);
        
        // Evalutation du code
        eval('?>' . $this->content);
        
        // Retour du tampon
        return ob_get_clean();
    }
    
    /**
     * Retourne le contenu du fichier
     * 
     * @param string Chemin du fichier à récupérer
     */
    private function get_content($filename)
    {
        return file_get_contents($filename);
    }
    
    /**
     * Parse le template
     * Tags autorisés :
     * {{ MY_VAR.name }}
     */
    protected function parse($content)
    {
        $content = preg_replace('#{{ *([0-9a-z_\.\-]+) *}}#i', '<?php $this->_show_var(\'$1\'); ?>', $content);
        return $content;
    }
    
    /**
     * Affiche une variable
     * 
     * @param string Nom de la variable
     */
    protected function _show_var($name)
    {
        echo $this->getVar($name, $this->data);
    }
    
    /**
     * Méthode récursive pour récupérer une variable, avec la capacité de 
     * déterminer des enfants
     * comme : parent.child.var
     * 
     * @param string    Nom de la variable
     * @param mixed     Parent de la variable
     * @return mixed    Valeur de la variable
     */
    protected function getVar($var, $parent)
    {
        $parts = explode('.', $var);
        if (count($parts) === 1)
        {
            // Aucun enfant
            return $this->getSubVar($var, $parent);
        }
        else
        {
            // Au moins 1 enfant
            $name = array_shift($parts);
            $new_parent = $this->getSubVar($name, $parent);
            $var = join('.', $parts);
            // Appel récursif
            return $this->getVar($var, $new_parent);
        }
    }
    
    /**
     * Détermine et retourne si la variable demandée est une simple variable,
     * un attribut ou une méthode en fonction de la nature du parent
     * 
     * @param string    Nom de la variable à récupérer
     * @param mixed     Parent de la variable
     * @return mixed    Variable demandée
     */
    protected function getSubVar($var, $parent)
    {
        if (is_array($parent))
        {
            if (isset($parent[$var]))
            {
                return $parent[$var];
            }
            // Si la variable n'existe pas on retourne une chaine vide
            return '';
        }
        if (is_object($parent))
        {
            // Si le parent est un objet
            if (is_callable([$parent, $var]))
            {
                // L'enfant est une méthode
                return $parent->$var();
            }
            if (isset($parent->$var))
            {
                // L'enfant est un attribut
                return $parent->$var;
            }
            return '';
        }
        return '';
    }
}