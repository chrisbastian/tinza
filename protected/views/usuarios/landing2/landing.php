<?php $base_url=Yii::app()->theme->baseUrl; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landing Enetpro 3.0</title>

	<!-- Bootstrap -->
	<link href="<?php echo $base_url; ?>/landing2/css/bootstrap.min.css" rel="stylesheet">

	<!--Compatibilidad con Navegadores para leer las queries -->
	<script src="<?php echo $base_url; ?>/landing2/js/html5shiv.js"></script>
	<script src="<?php echo $base_url; ?>/landing2/js/respond.js"></script>

	<!-- Hover -->
	<link href="<?php echo $base_url; ?>/landing2/css/hover-min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?php echo $base_url; ?>/landing2/css/font-awesome.min.css" rel="stylesheet">

	<!-- Style -->
</head>

<div id="contenedor" class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<section class="center-block">
				<article>
					<h1>Registro</h1>
					<h3>Negocio</h3>
					<br>
					<p>Te invito a que puedas ser parte de este gran negocio, que cambiara tu vida de una forma increible, para mas información registrate en este formulario.</p>
				</article>
				<?php foreach ($datos as $d ): ?>
					<?php echo $d['autorespondedor'];  ?>
				<?php endforeach ?>
				<!--
				<form action="" method="POST" role="form">
				
					<div class="form-group">
						<input type="text" class="form-control" id="" placeholder="NOMBRE">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="" placeholder="E-MAIL">
					</div>	
			
					<button type="submit" class="btn btn-primary center-block">Enviar</button>
				</form>
			-->
			</section>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo $base_url; ?>/landing2/https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>/landing2/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $base_url; ?>/landing2/js/bootstrap.min.js"></script>
<!-- Holder -->
<script src="<?php echo $base_url; ?>/landing2/js/holder.js"></script>

<link href="<?php echo $base_url; ?>/landing2/style.css" rel="stylesheet">


</body>
</html>