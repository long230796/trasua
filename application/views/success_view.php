<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>success</title>
</head>
<body>
	<?php foreach ($message as $key ): ?>
		<div class="alert alert-danger" role="alert">
		  <?php echo $key; ?>
		</div>
	<?php endforeach ?>
</body>
</html>