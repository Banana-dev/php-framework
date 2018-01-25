<!DOCTYPE>
<html>
	<head>
	<title>Banana Framework</title>

		<?php 

		use Banana\Helper\htmlHelper;

		echo htmlHelper::loadCss("vendor/twbs/bootstrap/dist/css/bootstrap.min.css");
		echo htmlHelper::loadCss("vendor/twbs/bootstrap/dist/js/bootstrap.min.js");

		?>
	</head>
	<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">{{header}}</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link active" href="index.php">Accueil</a>
		      <a class="nav-item nav-link" href="?controller=templateTest">TemplateTest</a>
		      <a class="nav-item nav-link" href="?action=docTemplate">Doc Template</a>
		    </div>
		  </div>
		</nav>
	</header>
	
	<div id="contenu">
		{{vue}}
	</div>


	<footer class='footer'>
		<span class='text-muted'>{{footer}}</span>
	</footer>

	</body>
</html>