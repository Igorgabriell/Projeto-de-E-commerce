<?php require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
session_start();
?>

<header>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
</header>

<article>

<div class="container-fluid">
	
	
	<?php 
	
	$search= $_GET['txtsearch'];
    $consult = $conn->query("SELECT * FROM vw_watch where nm_watch like concat ('%','$search','%')");

	if($consult-> num_rows== 0) {

		echo "<html><script>location.href='/erro2.php'</script></html>";
	  
	  };
	
	while($show = $consult->fetch_assoc()) { ?>

	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="<?php echo $show['photo']; ?>" class="img-fluid"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $show['nm_watch'];?></h4></div>
		<div class="col-sm-2"><h4 style="padding-top:20px">Preço: R$ <?php echo number_format($show['price'],2,',','.'); ?></h4></div>
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
        
        <a href="/detalhes.php?cd=<?php echo $show['cd_watch'];?>">
        <button class="btn btn-lg btn-block btn-light">
		<span class="bi bi-info-circle"> Detalhes</span>
				
    </button>
    </a>
		</div> 
				
	</div>		
	<?php } ?>
</div>
</article>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/footer.php');?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>