<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Formulaire de contact </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="coloc.jpeg">
</head>
	<style type="text/css">*::selection {
		background-color: lightblue;
		color : white;
		}
	</style>

	<style type="text/css">*::-moz-selection {
		background-color: lightblue;
		color : white;
		}
	</style>

<body>
	<form class="col-md-6" action="index.php" method="post">
	<?php require 'validation.php'; ?>
		<div class="form-group">
			<label for="name"> Nom : </label>
			<input type="text" name="name" id="name" required class="form-control">
		</div>

		<div class="form-group">
			<label for="mail"> Mail : </label>
			<input type="email" name="mail" id="mail" required class="form-control">
		</div>

		<div class="form-group">
			<label for="message"> Message : </label>
			<textarea id="message" name="message" required class="form-control"></textarea>
		</div>

		<button class="btn btn-primary" type="submit" name="submit"> Valider </button>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>