<?php require($_SERVER['DOCUMENT_ROOT'] .'/config.php');	
session_start();

$ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
$cd_user = $_SESSION['usuarioId'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consult = $conn->query("SELECT price FROM tbl_watch WHERE cd_watch='$cd'");
    $show = $consult->fetch_assoc();
    $cost = $show['price'];
    
	
	$insert = $conn->query("INSERT INTO tbl_order(nb_ticket,id_client,id_product,qt_product,vl_item)  VALUES
	('$ticket','$cd_user','$cd','$qnt','$cost')");
	
}

require($_SERVER['DOCUMENT_ROOT'] .'/cliente/carrinho/end.php');


?>