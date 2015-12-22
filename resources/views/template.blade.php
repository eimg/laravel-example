<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Example</title>

	<link href="<?= URL::asset('css/app.css') ?>" rel="stylesheet">
</head>
<body>
	<h1>Laravel Example</h1>
	<div class="container">
		@yield("main")
	</div>
</body>
</html>
