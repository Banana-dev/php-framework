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
		<h1>{{header}}</h1>
	</header>
	
	<div id="contenu">
		{{vue}}
	</div>


	<footer>
		{{footer}}
	</footer>

	</body>
</html>