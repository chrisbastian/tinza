<?php include("header.php"); ?>

<?php include("area-top.php"); ?>


<script type="text/javascript">
/*
$( document ).ready(function() {

	alert("This is a testing page...");

});
*/
</script>

<hr class="hr1">

<style type="text/css">

a{
	cursor: pointer;
}

</style>

<div id="area-content" class="container">
	<div class="row">
		<!--LEFT -->
		<div class="col-xs-12 col-sm-3">

			<style type="text/css">

			.popover
			{
				margin-left: -120px !important;
				position: fixed;
			}
			</style>

			<!--Formulario-->
			<section id="area-content-form" class="wrap-sidebar">
			<h3>Busca tu región</h3>
			<hr>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Arica%'),
					));

					
				 ?>


				<a id="region1" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				   data-content="<?php foreach ($model as $r) {
						echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
						echo "<br>";
					}?>">

					<div id="map1">Arica</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Tarapaca%'),
					));

					
				 ?>

				 <a id="region2" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map2">Tarapaca</div>
				</a>


				<!--Region 3 -->
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Antofagasta%'),
					));

					
				 ?>

				 <a id="region3" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map3">Antofagasta</div>
				</a>
			
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Atacama%'),
					));

					
				 ?>

				 <a id="region4" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map4">Atacama</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Coquimbo%'),
					));

					
				 ?>

				 <a id="region5" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map5">Coquimbo</div>
				</a>
				
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Valparaiso%'),
					));

					
				 ?>

				 <a id="region6" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map6">Valparaiso</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Metropolitana%'),
					));

					
				 ?>

				 <a id="region7" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map7">Metropolitana</div>
				</a>
			
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%OHiggins%'),
					));

					
				 ?>

				 <a id="region8" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map8">O'Higgins</div>
				</a>		
				
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Maule%'),
					));

					
				 ?>

				 <a id="region9" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map9">Maule</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Bio%'),
					));

					
				 ?>

				 <a id="region10" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map10">Bio Bio</div>
				</a>
				
				
				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Araucania%'),
					));

					
				 ?>

				 <a id="region11" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map11">Araucanía</div>
				</a>


				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Rios%'),
					));

					
				 ?>

				 <a id="region12" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map12">Los Rios</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Lagos%'),
					));

					
				 ?>

				 <a id="region13" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map13">Los Lagos</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Ibanez%'),
					));

					
				 ?>

				 <a id="region14" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				 		echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map14">Ibanez</div>
				</a>

				<?php 

					$model=Terrenos::model()->findAll(array(
						'select'=>'ciudad',
						'distinct'=>true,
					    'condition' => 'region LIKE :region',
					    'params' => array(':region' => '%Magallanes%'),
					));

					
				 ?>

				 <a id="region15" data-trigger="click" data-toggle="popover" data-placement="right" data-html="true"
				    data-content="<?php foreach ($model as $r) {
				    	echo "<a href='../../usuarios/BuscarTerrenos/".$r->ciudad."'>$r->ciudad</a>";
				 		echo "<br>";
				 	}?>">

					<div id="map15">Magallanes</div>
				</a>
				

			</section>
		</div>

		<style type="text/css">

		#img_terrenos{
			height: 200px !important;
		}
		</style>

		
		<!--RIGHT -->
		<div id="area-content-bloques" class="col-xs-12 col-sm-9 bloques">
			<div class="row">

				<?php foreach ($model_ciudad as $terrenos):?>

					<div class="col-xs-12 col-sm-4">
						<article>
							<h3><?php echo $terrenos->titulo; ?></h3>

			                <a style="cursor:pointer" href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/ver/'.$terrenos->id_terreno);?>">
			                	<center><img id="img_terrenos" class="img-responsive thumbnail pointer float" src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$terrenos->imagen1; ?>" alt=""></center>
			                </a>

							<div>
								<p>Precio: $<?php echo $terrenos->precio; ?> <br>
								   Metros Cuadrados: <?php echo $terrenos->metros_cuadrados; ?> m2 <br>
								   Región: <?php echo $terrenos->region; ?> <br>
								   Ciudad: <?php echo $terrenos->ciudad; ?> 


								</p>							
							</div>

						</article>
					</div>

				<?php endforeach; ?>

			</div>
		</div>

		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

		<div class="pagination">
		    <?php
		        $this->widget('CLinkPager', array(
		            'pages' => $pages,
		            'header' => "<div class='pagination pagination-right'>",
		        ))
		        ?>
		</div>

	</div>
</div>

<?php include("footer.php"); ?>

<!-- SCRIPTS -->
<?php include("scripts.php"); ?>

</body>
</html>