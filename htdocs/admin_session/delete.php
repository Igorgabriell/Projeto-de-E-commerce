<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/config.php");

if (!empty($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM tbl_watch WHERE cd_watch = $id";
	$res = $conn->query($sql);
	$show = $res->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Relogios de bolso</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		<title>Administrativo</title>

		<header>
			<?php

			require($_SERVER['DOCUMENT_ROOT'] . "/header.php");
			require($_SERVER['DOCUMENT_ROOT'] . "/config.php");
			?>
		</header>



		<?php
		$page_content = "";

		$page_content .= <<<HTML
		 <div class="container-fluid">
			<br>
			<div class="text-center">
				<h2 class="text-center">Tem certeza que deseja Excluir o Produto?</h2>
				<img class="img-thumbnail" style="width:350px;height:200px;" src="$show[photo]">
			</div>
			<br>
			<div class="text-center font-weight-bold">$show[nm_watch]</div>

			<form action="" method="POST">
				<div class="mb-3 text-center"><br>
					<a class="btn btn-lg btn-light btn-outline-dark" href="index.php">Cancelar</a>
					<input style="margin-left:10px;" type="submit" value="Confirmar" class="btn btn-lg btn-dark" />
				</div>
			</form>
HTML;

		if ($_SERVER["REQUEST_METHOD"] == "POST") :

			$sql = "DELETE FROM tbl_watch WHERE cd_watch = $id";

			$conn->query($sql);


			header('location: index.php');


		endif;




		echo <<<HTML
 $page_content 
 HTML;
