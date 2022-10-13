<?php session_start(); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/style.css">
<style>

.navbar{
	margin-bottom: 0;
}
	
</style>

<?php
	
	require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	require($_SERVER['DOCUMENT_ROOT'] . '/header.php');

	$conteudo = <<<HTML
	
	<div class="container-fluid">
	
		<div class="row d-flex justify-content-center">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2 class="text-center">Contato</h2>
				<form action="contact.php" method="post" name="contactform">
                <div class="form-group">
				
                <label for="email">E-mail</label>
                <input name="con_email" type="email" class="form-control" required id="email" placeholder="Digite seu email">
            </div>
					<div class="form-group">
				
						<label for="names">Nome completo</label>
						<input name="con_name" type="text" class="form-control" required id="username" placeholder="Digite seu nome">
					</div>
				
				<div class="form-group">
				
						<label for="phonenumber">Telefone</label>
						<input name="con_tel" type="text" class="form-control" required id="phone" placeholder="Digite seu telefone">
				</div>
                <label for="message">Mensagem</label> <br>
                <div class="form-group">
                
                    <select id="subject1" name="cont_sub" placeholder="Assunto"><br><br>
                    <option value="sugestao">Sugestão</option>
                    <option value="critica">Crítica</option>
                    <option value="elogio">Elogio</option>
                    <option value="outro">Outro</option>
                    </select>
                    <br><br>
				
              <textarea name="con_tent" id="idmessage" cols="50" rows="10" placeholder="Escreva uma mensagem"></textarea>
				
				<div class="text-right">			
				<button type="submit" class="btn btn-lg btn-primary">
					
					<span><i class="bi bi-send"></i> Enviar</span>
				</button>
                </div>
				
            </form>		
			</div>
		</div>
	</div>

	
HTML;
echo $conteudo;

if ($_SERVER["REQUEST_METHOD"] == "POST"):

    $sql=  "INSERT INTO tbl_contact ( 
       con_email,
	   con_name,
       con_tel,
	   cont_sub,
       con_tent
    ) values ( '{$_POST['con_email']}', '{$_POST['con_name']}', '{$_POST['con_tel']}','{$_POST['cont_sub']}', '{$_POST['con_tent']}');
   
   ";

   $conn->query($sql);
endif;
?>