<?php

require_once 'vendor/autoload.php';
use Banana\Utility\DB;
use Banana\Template\Template;
use Banana\Utility\File;
use Banana\Utility\Str;

$fieldNames = array();

$modelEntityName = '';
$pathEntityTemplate = 'lib/Helper/TemplateEntity.php';
$pathEntityFile = 'src/Model/Entity/';

$modelTableName = '';
$pathTableTemplate = 'lib/Helper/TemplateTable.php';
$pathTableFile = 'src/Model/Table/';
$tableName = '';
$entityName = '';

if(isset($argv[1]) && $argv[1] == 'model'){
	if(isset($argv[2])){
		try{
			DB::initialize();
			$req = "SHOW COLUMNS FROM " . $argv[2];
			$s = DB::$C->prepare($req);
			$s->execute();
			$results = $s->fetchAll();

//           var_dump($results);

			foreach ($results as $result){
				$exploded = explode('(',$result['Type']);
				$fieldNames[$result['Field']] = ['type' => $exploded[0]];
			}


			/**
			 * Création du fichier Entity
			 */

			$modelEntityName = ucfirst(Str::camelize(Str::singularize($argv[2]))).'Entity';

			$model = new Template($pathEntityTemplate, true);
			$model->set('modelEntityName', $modelEntityName);
			$model->set('fieldNames', $fieldNames);
			$fileContent = "<?php\n\n".$model->output();

			$file = new File();
			$file->writeNewFile($modelEntityName, 'php', $pathEntityFile, $fileContent);
			echo "Modèle créé avec succès ! \n";


			/**
			 * Création du fichier Entity
			 */
			$modelTableName = ucfirst(Str::camelize(Str::singularize($argv[2]))).'Table';
			$entityName = ucfirst(Str::camelize(Str::singularize($argv[2])));
			$tableName = $argv[2];
//			$tableName = ucfirst(Str::pluralize($argv[2]));

			$model = new Template($pathTableTemplate, true);
			$model->set('modelTableName', $modelTableName);
			$model->set('tableName', $tableName);
			$model->set('entityName', $entityName);
			$fileContent = "<?php\n\n".$model->output();

			$file = new File();
			$file->writeNewFile($modelTableName, 'php', $pathTableFile, $fileContent);
			echo "Table créée avec succès !";

		}catch(Exception $e){
			echo $e->getMessage();
		}

	}else{
		echo "Veuillez renseigner le nom de la table ";
	}

}else{
	echo 'erreur commande';

}
die();
