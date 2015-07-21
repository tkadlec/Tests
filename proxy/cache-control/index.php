<?php
header("Cache-Control: no-transform");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Testing cache-control: no-transform</title>
	<style>
	#blank{
		background: #ccc;
		color: #fff;
	}
	body {
		font: 100%/1.5em "Helvetica Neue",Helvetica,Arial,sans-serif;
		color: #404040;
	}
	</style>
</head>
<body>
	<h1>Testing cache-control: no-transform</h1>
	<p>This page has inline JavaScript and inline CSS, but also has <code>cache-control: no-transform</code> set. Let's see what proxy browsers do!</p>
	<div id="blank"></div>
	<script>
		/* Just some basic inline javascript */
		function logIt(blah) {
			//let's add something to the dom
			var blank = document.getElementById('blank');
			blank.innerHTML = blah;
		}
		// call it!
		blah('innerHTML FTW');
	</script>
</body>
</html>
