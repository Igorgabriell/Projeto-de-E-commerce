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
            ?>
        </header>


        <?php

        $nm_relogio = $show['nm_watch'];
        $vl_preco =  number_format($show['price'], 2, ',', '.');
        $marca = $show['label'];
        $qt_estoque = $show['qt_store'];
        $ds_produto = $show['ds_product'];


        $page_content = "";

        $html_form = <<<HTML
			<div class="container-fluid">

				<div class="container">
					<div class="row justify-content-center">
						<form class="col-sm-10 col-md-8 col-lg-6 " action="" method="POST" enctype="multipart/form-data" action="">
							<h1>Editar Produto</h1>
							<div class="form-floating mb-3">
								<label for="txtEmail">Nome</label>
								<input type="text" name="nm_relogio" id="name" class="form-control" value="$nm_relogio" placeholder="" required autofocus>
							</div>
							<div class="form-floating mb-3 ">
								<label for="txtEmail">Preço em R$</label>
								<input type="text" name="vl_preco" class="form-control" placeholder="" value="$vl_preco" required onkeypress="$(this).mask('#.##0,00', {reverse: true});">
							</div>
							<div class="form-floating mb-3">
								<label for="txtEmail">Marca</label>
								<input type="text" name="marca" id="marca" class="form-control" value="$marca" placeholder=" " required autofocus>
							</div>
							<div class="form-floating mb-3">
								<label for="txtEmail">Quantidade em estoque</label>
								<input type="number" name="qt_estoque" id="qtd_estoque" class="form-control" placeholder="" value="$qt_estoque" required autofocus>
							</div>
							<div class="form-floating">
								<label for="floatingTextarea2">Descrição</label>
								<textarea name="ds_produto" class="form-control" placeholder="Descreva o produto" value="$ds_produto" id="text-area" required style="height: 100px"></textarea>
							</div>
							<div class="form-group">

								<label for="sg_lacamento">Lançamento?</label>

								<select class="form-control" name="sg_lacamento" required>
									<option value="">Selecione</option>
									<option value="S">Sim</option>
									<option value="N">Não</option>
								</select>

							</div>
							<p><label for="">Selecione uma ilustração</label>
								<input type="file" name="arquivo" required>
							</p>
							<button class="btn btn-outline-dark" type="submit">Cancelar</button>
							<button class="btn btn-dark mx-auto" type="submit">Editar</button>
						</form>

HTML;

        if (!empty($_FILES['arquivo'])) :
            $file = $_FILES['arquivo'];

            if ($file['error']) :
                $page_content .= <<<HTML
						 <div class="alert alert-danger text-center" role="alert">
							Imagem não enviada, tente novamente.
					</div>
					{$html_form}
HTML;

            elseif ($file['size'] > 2097152) :
                $page_content .= <<<HTML
					<div class="alert alert-danger text-center" role="alert">
						Envie imagens de até 2MB!
				</div>
				{$html_form}
				HTML;

            else :

                $folder = "../img/";
                $fileName = $file['name'];
                $newFileName = uniqid();
                $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if ($extension != 'jpg' && $extension != 'png') :
                    $page_content .= <<<HTML
				 <div class="alert alert-danger text-center" role="alert">
					Formato de arquivo não suportado!
					</div>
					{$html_form}
HTML;

                else :
                    $path = $folder . $newFileName . "." . $extension;
                    $nm_relogio = $_POST['nm_relogio'];
                    $vl_preco = str_replace('.', '', $_POST['vl_preco']);
                    $vl_preco = str_replace(',', '.', $vl_preco);
                    $marca = $_POST['marca'];
                    $qt_estoque = $_POST['qt_estoque'];
                    $ds_produto = $_POST['ds_produto'];
                    $sg_lacamento = $_POST['sg_lacamento'];

                    if (
                        empty($nm_relogio) or empty($vl_preco) or empty($marca) or empty($qt_estoque) or
                        empty($ds_produto) or empty($sg_lacamento)
                    ) :
                        $page_content .= <<<HTML
					 <div class="alert alert-danger text-center" role="alert">
						Preencha todos os Campos
						</div>
						{$html_form}
HTML;

                    else :
                        $move = move_uploaded_file($file["tmp_name"], $path);
                        $sql = "UPDATE  tbl_watch SET
                        nm_watch = '$nm_relogio',
                        price = '$vl_preco',
                        label = '$marca',
                        qt_store = '$qt_estoque',
                        ds_product = '$ds_produto',
                        photo = '$path',
                        sg_new = '$sg_lacamento' WHERE cd_watch = $id";
                        $conn->query($sql);

                        $page_content .= <<<HTML
						 <div class="alert alert-success text-center" role="alert">
							Atualização feita com sucesso
							</div>
							{$html_form}
HTML;
                        header("refresh: 3;index.php");

                    endif;

                endif;

            endif;

        else :
            $page_content .= $html_form;

        endif;



        echo <<<HTML
							 $page_content <script src="script.js">
								</script>
								<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


HTML;
        ?>