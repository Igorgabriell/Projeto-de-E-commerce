<?php
session_start();
//Incluindo a conexão com banco de dados
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
//O campo usuário e senha preenchido entra no if para validar
if ((isset($_POST['umail'])) && (isset($_POST['upass']))) {
	$usuario = mysqli_real_escape_string($conn, $_POST['umail']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
	$senha = mysqli_real_escape_string($conn, $_POST['upass']);
	$senha = SHA1($senha);

	//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
	$result_usuario = "SELECT * FROM tbl_users WHERE user_email = '$usuario' && user_pass = '$senha' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);

	//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
	if (isset($resultado)) {
		$_SESSION['usuarioId'] = $resultado['user_id'];
		$_SESSION['usuarioNome'] = $resultado['user_name'];
		$_SESSION['usuariotipo'] = $resultado['user_type'];
		$_SESSION['usuarioEmail'] = $resultado['user_email'];
		if ($_SESSION['usuariotipo'] == "1") {
			header("Location: /login/administrativo.php");
		} elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") {
			header("Location: http://localhost/index.php");
		} else {
			header("Location: /cliente/index.php");
		}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
	} else {
		//Váriavel global recebendo a mensagem de erro
		$_SESSION['loginErro'] = "Usuário ou senha Inválido";
		header("Location: index.php");
	}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
} else {
	$_SESSION['loginErro'] = "Usuário ou senha inválido";
	header("Location: index.php");
}
