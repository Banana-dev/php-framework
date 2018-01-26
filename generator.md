#Générateur

## Comment ça marche
Pour créer des modèles rapidement et simplement grâce au super générateur.
Dans un premier temps, compléter le fichier `config.php`  concernant la connexion à votre base de données et le nom de votre base de données.

config.php

```php
'db' => [
        'host' => 'localhost', //ip du serveur
        'username' => 'root', //pseudo
        'password' => '', //mot de pass
        'db' => '9tracks' //nom de la base
    ],
```
### Création des modèles

Depuis la console

```
   php generator.php model nomTable
```

La commande va générer automatiquement le modèle Entity et Table
de la table renseignée.

Emplacement de l'entité : ``src/Model/Entity``

Emplacement de la table : ``src/Model/Table``