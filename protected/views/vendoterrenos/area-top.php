<!--Script Jquery-->
<script type="text/javascript">
	
	function go()
	{
		window.location="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/publicar');?>";
	}

</script>

<div id="area-top" class="container-fluid">
	<div class="row">
		<div id="area-top-navegacion" class="col-xs-12">
			<article>

				<ul>
					<li>
						<button type="button" onclick= " window.location='<?php echo Yii::app()->createAbsoluteUrl('/usuarios/login');?>' " class="btn btn-default"><i class="fa fa-user"></i>  Ingresar a Oficina</button>
					</li>
				</ul>

			</article>
		</div>

		<div id="area-top-logo" class="col-xs-12 col-sm-6">
			<article>
				<a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/home');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendoterrenos_style/img/logo.png" alt="" class="img-responsive"></a>
			</article>
		</div>
		
		<!-- Liberado para colocar lo que se etime conveniente -->
		<div id="area-top-boton" class="col-xs-12 col-sm-6">

		</div>
	</div>
</div>

<div id="area-publicar" class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h2>"La manera más rapida de vender terrenos en Chile"</h2>
		</div>
		<div class="col-xs-12 text-center">
			<article>
				<button onclick="go();" type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Publicar</button>
			</article>
		</div>
	</div>
</div>