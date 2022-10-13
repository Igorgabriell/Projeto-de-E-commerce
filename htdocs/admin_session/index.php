<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

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
	</head>

	<header>
		<?php

		require($_SERVER['DOCUMENT_ROOT'] . "/header.php");
		require($_SERVER['DOCUMENT_ROOT'] . "/config.php");
		?>
	</header>


	<?php

	$sql = "SELECT * FROM tbl_watch ORDER BY cd_watch DESC";
	$res = $conn->query($sql);

	$page_content = <<<HTML
			<div class="container-fluid p-3">

		<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
	  <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Marca</th>
      <th scope="col">Preco</th>
	  <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
			
HTML;


	while ($show = $res->fetch_assoc()) :
		$vl_preco = "R$ " . number_format($show['price'], 2, ',', '.');

		$page_content .= <<<HTML
 	<tr>
    	<td>$show[cd_watch]</td>
		<td><img style="width:100px; height:50px" src="$show[photo]"></td>
      	<td>$show[nm_watch]</td>
      	<td>$show[label]</td>
	  	<td>$vl_preco</td>
		<td><a href="edit.php?id=$show[cd_watch]">Editar</a> <a href="delete.php?id=$show[cd_watch]">Remover</a></td>
    </tr>
HTML;

	endwhile;
	$page_content .= ' </tbody>
		</table></div>';

	echo <<<HTML
		
		
		$page_content
HTML;
