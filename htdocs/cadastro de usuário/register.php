<style>
    .navbar {
        margin-bottom: 0;
    }
</style>

<body>

    <?php

    require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/header.php');



    $conteudo = <<<HTML
	<br>
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Cadastre-se</h2>
				<form action="register.php" method="post" name="registerform">
					<div class="form-group">
				
						<label for="name">Nome Completo</label>
						<input name="user_name" type="text" class="form-control" required id="nameuser" placeholder="Digite seu nome">
					</div>
				
				<div class="form-group">

                <div class="form-group">
				
                <label for="usercpf">CPF</label>
                <input name="user_cpf" type="text" class="form-control" required id="cpf" onkeypress="$(this).mask('000.000.000-00')" placeholder="Digite seu cpf">
        </div>
				
						<label for="birthdate">Data de nascimento</label>
						<input name="user_birth" type="date" class="form-control" required id="birth" placeholder="Digite sua data de nascimento">
				</div>
                <div class="form-group">
				
                <label for="useremail">E-mail</label>
                <input name="user_email" type="email" class="form-control" required id="emailuser" placeholder="Digite seu e-mail">
        </div>

                    
        <div class="form-group">
				
                <label for="userpass">Senha</label>
                <input name="user_pass" type="password" class="form-control" required id="uspass" placeholder="Digite sua senha">
    </div>
            <div>
                <label for="userpass">Confirme a senha</label>
                <input name="confirm_pass" type="password" class="form-control" required id="uspass" placeholder="Confirme sua senha">
        </div>		
        <br>
				<button type="submit" class="btn btn-lg btn-default btn-outline-dark">
					
					<span class="glyphicon glyphicon-ok "> Enviar</span>
					
				</button>
				
            </form>		
		
		</div>
	</div>
	
HTML;
    echo $conteudo;

    if ($_SERVER["REQUEST_METHOD"] == "POST") :

        $password = $_POST['user_pass'];
        $confirmpassword = $_POST['confirm_pass'];

        if ($password != $confirmpassword) :
            echo <<<HTML
<div class="alert alert-danger col-4 text-center" role="alert">
  As senhas não combinam.
</div>
HTML;
        else :

            echo <<<HTML
<div class="alert alert-success col-4 text-center" role="alert">
 Perfil Cadastrado com sucesso! Agora você pode se logar.
</div>
HTML;

            $sql =  "INSERT INTO Tbl_users ( 
       user_name,
       user_birth,
       user_cpf,
       user_email,
       user_pass
    ) values ( '{$_POST['user_name']}', '{$_POST['user_birth']}','{$_POST['user_cpf']}','{$_POST['user_email']}', SHA1('{$_POST['user_pass']}'));
   
   ";
            $conn->query($sql);
        endif;
    endif;


    require($_SERVER['DOCUMENT_ROOT'] . '/footer.php') ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>