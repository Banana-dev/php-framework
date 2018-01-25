#Templating

##Création de la vue

###Dans le controlleur
Pour créer une template de vue:

1. Il faut déclarer une nouvelle template pour la vue:
```php
$template = new Template("chemin/de/la/vue");
```
2. Ensuite pour définir une variable à afficher dans la vue on utilise la méthode `set()` qui prend en premier paramètre le nom de la variable et en deuxième sa valeur:
```php
	$template->set('title', '404 not found');
```
3. Il suffit ensuite de retourner la variable contenant la template:
```php
	return $template->output();
```

###Dans la vue
Pour récupérer les variables créées précedemment dans le controlleur, il éxiste 2 méthodes: 

1. Pour écho la variable directement, on utilise les accolades `{{ foo }}`
2. Ou récupérer la variable pour pouvoir itérer son contenu, si il s'agit d'un tableau.
```php
	foreach($foo as $f) {
		echo $f;
	}
```

##Quelques exemples

```php
	/* Partie dans le controlleur */

	$array = ['premier', 'deuxieme', 'troisieme'];

	$template = new Template("src/views/index.html");
				$template->set('title', 'Ceci est un titre');
				$template->set('contenu', 'Ceci est un paragraphe qui a pour but d'être affiché dans une vue');
				$template->set('array', $array);
				return $template->output();
```
```html
	/* Partie dans la vue */

	<h3>{{ title }}</h3>

	<p>{{ contenu }}</p>

	<ul>
		foreach($array as $item){
			echo '<li>'.item.'</li>';
		}
	</ul>
```

