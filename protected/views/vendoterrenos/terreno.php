<?php include("header.php"); ?>

<?php include("area-top.php"); ?>

<hr class="hr1">

<div id="area-content" class="container">
	<div class="row">	

		<!--LEFT -->
		<div class="col-xs-12 col-sm-3">
			
			<!--Formulario-->
			<section id="area-content-form" class="wrap-sidebar" hidden>
				<form action="">
					
					<div class="form-group">
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Buscar por palabra clave">
					</div>

					<select class="form-control form-group">
					  <option>Seleccione su región</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>

					<select class="form-control form-group">
					  <option>Seleccione su comuna</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>

					<section class="form-group">
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Todos
						</label>
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Comprar
						</label>
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Vender
						</label>
					</section>
					
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<select class="form-control form-group">
							  <option>Precio Max</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>
						</div>

						<div class="col-xs-12 col-sm-6">
							<select class="form-control form-group">
							  <option>Precio Min</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>
						</div>

						<div class="col-xs-12 col-sm-6">
							<select class="form-control form-group">
							  <option>m2 Min</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>
						</div>

						<div class="col-xs-12 col-sm-6">
							<select class="form-control form-group">
							  <option>m2 Max</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>

				</form>
			</section>

			<section class="wrap-sidebar" hidden>
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendoterrenos_style/js/holder.js/300x300/auto/text:PUBLICIDAD" alt="" class="img-responsive thumbnail">
			</section>

		</div>
		
		<!--RIGHT -->
		<div class="col-xs-12 col-sm-12">
			<div class="row wrap-sidebar">
				
				<!--Panel izquierdo -->
				<div class="col-xs-12">

					<div class="row bloques">

						<div class="col-xs-12">
							<article>
								<center><h3><b><?php echo $model->titulo ?></b></h3></center>
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								  <!-- Indicators -->
								  <ol class="carousel-indicators">
								    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								    <?php if($model->imagen2!=NULL): ?>
								    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<?php endif; ?>

									<?php if($model->imagen3!=NULL): ?>
								    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									<?php endif; ?>

									<?php if($model->imagen4!=NULL): ?>
								    	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
									<?php endif; ?>

									<?php if($model->imagen5!=NULL): ?>
								    	<li data-target="#carousel-example-generic" data-slide-to="4"></li>
									<?php endif; ?>

									<?php if($model->imagen6!=NULL): ?>
								    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
									<?php endif; ?>

								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								    	<img height="100px !important" width="100%" src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen1; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

								    <?php if($model->imagen2!=NULL): ?>

								    <div class="item">
								    	<img src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen2; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

									<?php endif; ?>

									<?php if($model->imagen3!=NULL): ?>

								    <div class="item">
								    	<img src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen3; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

									<?php endif; ?>

									<?php if($model->imagen4!=NULL): ?>

								    <div class="item">
								    	<img src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen4; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

									<?php endif; ?>

									<?php if($model->imagen5!=NULL): ?>

								    <div class="item">
								    	<img src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen5; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

									<?php endif; ?>

									<?php if($model->imagen6!=NULL): ?>

								    <div class="item">
								    	<img src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$model->imagen6; ?>" alt="" class="img-responsive">
								      <div class="carousel-caption">
								      </div>
								    </div>

									<?php endif; ?>

								  </div>

								  <!-- Controls -->
								  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>
								<div><p><b><?php echo $model->descripcion; ?></b></p></div>
							</article>
						</div>

					</div>

				</div>
				
				<!--Panel Derecho -->
				<div class="col-xs-12">
					<!--Formulario-->
					<section>
						<h3><b>UBICACIÓN DEL TERRENO</b></h3><hr>
						<p>Región de: <?php echo $model->region; ?></p>
						<p>Comúna de: <?php echo $model->comuna; ?></p>
						<p>Dirección: <?php echo $model->direccion; ?></p>
						<p>Precio: $<?php echo $model->precio; ?></p> 
						<p>Telefono de Contacto: <i class="fa fa-phone"></i> <?php echo $model->telefono; ?></p>

						<hr>

						<h3><b>OTRA INFORMACIÓN TERRENO</b></h3>
						<p>Metros cuadrados construidos: <?php echo $model->metros_cuadrados; ?> m2</p>
						<hr>

            <body>
                <div hidden id="panel">
                  <input id="address" type="textbox" value="<?php echo $model->pais; ?>,<?php echo $model->region ?>,<?php echo $model->comuna; ?>">
                  <input type="button" value="Geocode" onclick="codeAddress()">
                </div>
                <div id="map-canvas"></div>  
            </body>

					</section>
				</div>

            <style>
              html, body {
                height: 100%;
                margin: 0px;
                padding: 0px
              }

              #map-canvas{
                margin: 0px;
                padding: 350px
              }
              #panel {
                position: absolute;
                top: 5px;
                left: 50%;
                margin-left: -180px;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
              }
            </style>
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
            <script>


        var geocoder;
        var map;

        $(document).ready(function(){
          codeAddress();
        });

        function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(-34.397, 150.644);
          var mapOptions = {
            zoom: 20,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          codeAddress();
        }

        function codeAddress() {

          var address= $('#address').val();
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location,
                  animation:google.maps.Animation.BOUNCE

              });

              
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

          </script>
  

			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

<!-- SCRIPTS -->

</body>
</html>