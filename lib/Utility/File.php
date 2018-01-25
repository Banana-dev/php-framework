<?php

namespace Banana\Utility;

class File
{
    public $fileAbsolute = '';
    public $filename = '';
    public $fileContent = '';

    public function createEmptyFile($name, $ext, $path = "./")
    {
        $fileAbsolute = $path . $name . "." . $ext;
        $filename = $name . "." . $ext;
        $file = fopen($filename, 'x+');
        fclose($file);
        return $filename . 'créé';
    }

    public function writeNewFile($name, $ext, $path = "./", $content)
    {
        $fileAbsolute = $path . $name . "." . $ext;
        $file = fopen($fileAbsolute, 'x+');
        fwrite($file, $content);
        fclose($file);
    }

    public function readFile($name, $ext, $path = "./")
    {
        $fileAbsolute = $path . $name . "." . $ext;
        $file = fopen($fileAbsolute, 'r');
        $contents = fread($fileAbsolute, filesize($fileAbsolute));
        fclose($file);
    }

    public function updateFile($name, $ext, $content, $path = "./")
    {
        $fileAbsolute = $path . $name . "." . $ext;
        $file = fopen($fileAbsolute, 'a');
        fwrite($file, $content);
        fclose($file);
    }

    public function deleteFile($name, $ext, $path = "./")
    {
        $filename = $name . "." . $ext;
        echo 'Effacer le fichier ' . $filename;
    }

    public function moveFile($name, $ext, $path = "./", $newPath = "./")
    {
        $filename = $name . "." . $ext;
        echo 'Deplacer ici.';
    }


}

//Ajout dans dossier avec ou sans forcage si fichier déjà présent
//Gérer le format entré dans l'ajout / création