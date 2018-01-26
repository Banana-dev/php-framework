<?php

use Banana\Helper\htmlHelper;
use Banana\Utility\Auth;
use Banana\Utility\Config;
use Banana\Utility\Flash;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{title}}</title>
    <?= htmlHelper::loadCss('bootstrap.min.css') ?>
    <?= htmlHelper::loadCss('bootstrap-theme.min.css') ?>
    <style>
        body {
            visibility: hidden;
            padding-top: 60px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= Config::get('site.name') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?= htmlHelper::link('Artistes', 'artists', 'index') ?></li>
                <?php if (Auth::isAuth()): ?>
                    <li><?= htmlHelper::link('Déconnexion', 'users', 'logout') ?></li>
                <?php else: ?>
                    <li><?= htmlHelper::link('Connexion', 'users', 'login') ?></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right mrl">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Langue <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Français</a></li>
                        <li><a href="#">Anglais</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <h1>{{title}}</h1>
    <?php if (Flash::hasFlash()): ?>
        <?php foreach (Flash::get() as $flash): ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['value'] ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    {{_view}}

</div>
<?= htmlHelper::loadJs('jquery-2.2.4.min.js  ') ?>
<script>
  // var _386 = { onePass: true, speedFactor: .5 }
  var _386 = {fastLoad: true}
</script>
<?= htmlHelper::loadJs('bootstrap.min.js') ?>
</body>
</html>