<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landing Enetpro 3.0</title>

	<?php $base_url=Yii::app()->theme->baseUrl; ?>

	<!-- Bootstrap -->
	<link href="<?php echo $base_url; ?>/css_landing/bootstrap.min.css" rel="stylesheet">

	<!--Compatibilidad con Navegadores para leer las queries -->
	<script src="<?php echo $base_url; ?>/js_landing/html5shiv.js"></script>
	<script src="<?php echo $base_url; ?>/js_landing/respond.js"></script>

	<!-- Hover -->
	<link href="<?php echo $base_url; ?>/css_landing/hover-min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?php echo $base_url; ?>/css_landing/font-awesome.min.css" rel="stylesheet">

	<!-- Style -->
	<link href="<?php echo $base_url; ?>/css_landing/style.css" rel="stylesheet">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Experiencia Laboral | Registro</title>

        </head>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.1.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src=""></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Flot -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/flot/jquery.flot.pie.js"></script>

        <!-- Peity -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/peity/jquery.peity.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/demo/peity-demo.js"></script>


        <!-- Custom and plugin javascript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/inspinia.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/pace/pace.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

            <!-- jQuery UI -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jquery-ui/jquery-ui.min.js"></script>

            <!-- GITTER -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/gritter/jquery.gritter.min.js"></script>

            <!-- EayPIE -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/easypiechart/jquery.easypiechart.js"></script>

            <!-- Sparkline -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>

            <!-- Sparkline demo data  -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/demo/sparkline-demo.js"></script>

            <!-- ChartJS-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/chartJs/Chart.min.js"></script>   

         <!-- Mainly scripts -->

         <!-- Custom and plugin javascript -->
         <!-- Chosen -->
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/chosen/chosen.jquery.js"></script>  

        <!-- JSKnob -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jsKnob/jquery.knob.js"></script>  

        <!-- Input Mask-->
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>  

        <!-- Data picker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>  

        <!-- NouSlider -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/nouslider/jquery.nouislider.min.js"></script>  

        <!-- Switchery -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/switchery/switchery.js"></script>  

         <!-- IonRangeSlider -->
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>  

         <!-- iCheck -->
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js"></script>  

         <!-- MENU -->
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>  


    <style type="text/css">
    #login_div{
        margin-top: -420px;
    }

    </style>


</head>


<style type="text/css">

#la-perfil {
	background: url(<?php echo $base_url; ?>/img_landing/perfil-bg.png) center top repeat-x;
	height: 440px;
}

#la-perfil-hr {
	background: url(<?php echo $base_url; ?>/img_landing/perfil-hr-bg.jpg) center top repeat-x;
	height: 80px;
	text-align: center;
}

#la-video-bg {
	background: url(<?php echo $base_url; ?>/img_landing/perfil-video-bg.png) center center no-repeat;
	background-size: cover;
}

#la-form {
	background: url(<?php echo $base_url; ?>/img_landing/perfil-form-bg.jpg) center center;
	height: 100%;
}

</style>

<?php foreach ($datos as $d): ?>
    <?php $foto= $d['curriculum']; ?>
    <?php $nombre= $d['nombre']; ?>

<?php endforeach ?>

<!-- Perfil -->
<section id="la-wrap-perfil">
	<div id="la-perfil" class="container-fluid">
		<div class="row">
			<div class="col-xs-12 text-center">
				<div class="la-wrap-img center-block mt">
					<img class="img-responsive img-circle" src="<?php echo Yii::app()->getBaseUrl(true).'/files/'.$foto; ?>" alt="<?php echo $nombre; ?>"><!--| La imagen debe ser proporción 1:1 cuadrada de 300x300px |-->
				</div>
				<h3><?php echo $nombre; ?></h3><!--| Limitar a 27 caracteres para no romper el diseño |-->
				<p>Asesor de network marketing</p> <!--| Limitar a 35 caracteres para no romper el diseño |-->
			</div>
		</div>
	</div>
</section>

<!-- Separador  -->
<section id="la-perfil-hr" class="container-fluid">
	<h3>Bienvenidos a la nueva era</h3>
</section>

<section id="la-video" class="container-fluid">
	<div class="row">
		<div id="la-video-bg" class="col-xs-12 text-center">

			<article class="center-block">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="//www.youtube.com/embed/QQbfE7gv5rA?rel=0&autoplay=0" allowfullscreen=""></iframe>
				</div>
			</article>

		</div>
		<div class="col-xs-12">
			<div id="la-video-p" class="center-block">
				<!--| Editor de texto para que ellos puedan poner negrita, salto de linea o links |-->
				<p>Aprende a generar grandes ingresos desde tu hogar, con un método de trabajo colaborativo, paciencia y mucho entusiasmo, acá aprenderás a ganar 500 USD diarios grancias a nuestros sistema de prospección que ha sido preparado detalladamente en Rustiko, una de las mejores universidades de país de Curicó, cerca de Chile.</p>
			</div>
		</div>
	</div>
</section>

<div class="errorMessage"</div>

<style type="text/css">
	
	.errorMessage *{
		color:white;
	}
</style>

<!-- Capturador -->
<section id="la-form" class="container-fluid">
	<div class="row">
		<div class="col-xs-12 text-center">
			<article>
                <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.1.js"></script>

				 <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'usuarios-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
                'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'center-block'),

            )); ?>
                  
            <body onload="initialize()">

                    <input type="hidden" class="field" id="street_number" disabled="true"></input>
                    <input type="hidden" class="field" id="postal_code" disabled="true"></input>

                    <div class="form-group">
                        
                        <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Nombre")); ?>
                        <?php echo $form->error($model,'nombre'); ?>
                    </div>

                    <div class="form-group">
                        
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Correo Electronico")); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>

                    <div class="form-group">
                        
                        <?php echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Usuario")); ?>
                        <?php echo $form->error($model,'usuario'); ?>
                    </div>

                    <div class="form-group">
                        
                        <input size="60" maxlength="500" class="form-control" placeholder="Contraseña" name="Usuarios[password]" id="Usuarios_password" type="password" value="">                        
                        <?php echo $form->error($model,'password'); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary block full-width m-b">Registrarme</button>
                    </div>

                    <!--
                    <div class="form-group">
                        <p class="text-muted text-center"><small>¿Ya tienes una cuenta?</small></p>
                        <a class="btn btn-sm btn-white btn-block" href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/login');?>">Ingresar</a>
                    </div>
                	-->

                   
            <?php $this->endWidget(); ?>
			</article>
		</div>
	</div>
</section>

<footer>

</footer>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>/js_landing/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $base_url; ?>/js_landing/bootstrap.min.js"></script>
<!-- Holder -->
<script src="<?php echo $base_url; ?>/js_landing/holder.js"></script>

</body>
</html>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<script>        
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};


function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>