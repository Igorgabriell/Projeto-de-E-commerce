<?php
session_start();
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
  </head>

  <header>
    <?php

    require($_SERVER['DOCUMENT_ROOT'] . "/header.php");
    require($_SERVER['DOCUMENT_ROOT'] . "/config.php");
    ?>
  </header>


  <?php

  $sql = "SELECT * FROM tbl_users WHERE user_type ='2' AND user_status ='on' ORDER BY user_id DESC";
  $res = $conn->query($sql);

  $page_content = <<<HTML
			<div class="container-fluid p-3">

		<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
	<th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Registro</th>
      <th scope="col">Opções</th>
	    </tr>
  </thead>
  <tbody>
			
HTML;


  while ($show = $res->fetch_assoc()) :

    $created = date("d/m/Y H:i:s", strtotime($show['created']));
    $page_content .= <<<HTML
 	<tr>
    	<td>$show[user_id]</td>
	      	<td>$show[user_name]</td>
      	<td>$show[user_email]</td>
	  	<td>$created</td>
		<td><a href="userdetail.php?id=$show[user_id]">Detalhar</a> <a href="deleteuser.php?id=$show[user_id]">Remover</a></td>
    </tr>
HTML;

  endwhile;
  $page_content .= ' </tbody>
		</table></div>';

  echo <<<HTML
		
		
		$page_content
HTML;
