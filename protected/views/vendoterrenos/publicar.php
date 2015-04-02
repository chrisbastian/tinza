<?php include("header.php"); ?>

<?php include("area-top.php"); ?>

<hr class="hr1">

<div id="area-content" class="container">
	<div class="row">
		
		<!--LEFT -->
		<div class="col-xs-12 col-sm-3">
			
			<!--Formulario-->
			<section hidden id="area-content-form" class="wrap-sidebar">
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

			<section class="wrap-sidebar">
				<img src="http://placehold.it/300x300" alt="" class="img-responsive thumbnail">
			</section>

		</div>
		
		<!--RIGHT -->
		<div class="col-xs-12 col-sm-9">
			<div class="row wrap-sidebar">
				
				<!--Panel izquierdo -->
				<div class="col-xs-12">
					<center><h2>Publicar Terreno</h2><hr></center>

					<div class="row bloques">

						<?php $this->renderPartial('../script'); ?>

						<div class="col-xs-12" id="locationField">
						 <article>	
						  	<input id="autocomplete" class="form-control" placeholder="Buscar Ubicación..." onFocus="geolocate()" type="text"></input>
						 </article>
						</div>

						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'terrenos-form',
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
							'htmlOptions' => array('enctype' => 'multipart/form-data'),

						)); ?>

						<body onload="initialize()">
								<!--No eliminar, necesario para api de google-->
							  	<input type="hidden" class="field" id="street_number" disabled="false"></input>
							    <input type="hidden" class="field" id="postal_code" disabled="false"></input>
							    <input type="hidden" class="field" id="sublocality" disabled="false"></input>
							    <input type="hidden" class="field" id="administrative_area_level_2" disabled="false"></input>

						<div class="col-xs-6">

						<style type="text/css">
						.errorMessage *{
						color: red !important;
						}
						</style>

						<script type="text/javascript">

							toastr.options = {
							  "closeButton": true
							}

							function validateEmail($email) {
							  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
							  if( !emailReg.test( $email ) ) {
							    return false;
							  } else {
							    return true;
							  }
							}

							function validarDatos()
							{
								var user= $('#id_vendedor').val();
								var email= $('#email').val();


									    $.ajax({
									    type:"POST",
									    url: $("#link_ajax_usuario").attr("action"),
									    data: {user:user,email:email},
									    beforeSend: function (){
									    },
									    success: function(resp)
									    {
									  		
									    	if(resp==1)
									    	{
									    		$('#button_publicar').attr("disabled", "disabled");
									    		toastr.error('Este Usuario ya fue utilizado por otra persona!!.');
									    		return;
									    	}

									    	if(resp==2)
									    	{
									    		$('#button_publicar').attr("disabled", "disabled");
									    		toastr.error('Este Email ya fue utilizado por otra persona!!.');
									    		return;

									    	}

									    	if(!validateEmail(email))
									    	{
									    		$('#button_publicar').attr("disabled", "disabled");
									    		return;
									    	}

									    	if(validateEmail(email) && resp!=2)
									    	{
									    		$('#button_publicar').removeAttr("disabled");
									    		return;

									    	}

									    	if(resp!=1 && resp!=2) 
									    	{
									    		$('#button_publicar').removeAttr("disabled");
									    		return;

									    	}


													
						 			    }

								});
							}



						</script>	

						<article>	
							<?php echo $form->textField($model,'id_vendedor',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Nombre de Usuario",'id'=>"id_vendedor",'onkeyup'=>"validarDatos()")); ?>
							
							<?php if($form->error($model,'id_vendedor')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"id_vendedor"); ?>')

									});
									
								</script>

							<?php endif; ?>

						</article>
						</div>

						<div id="link_ajax_usuario" action="../../usuarios/validarUsuario"></div>

						<div class="col-xs-6">
						<article>
							<input class="form-control" id="email" type="email" name="email" placeholder="Correo Electronico" onkeyup="validarDatos()">	
						</article>
						</div>

						<div class="col-xs-6">
						<article>
							<input class="form-control" type="password" name="password" placeholder="Contraseña de Acceso">	
						</article>
						</div>
						
						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Titulo")); ?>
							
							<?php if($form->error($model,'titulo')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"titulo"); ?>')

									});
									
								</script>

							<?php endif; ?>

						</article>
						</div>

						<script type="text/javascript">

							function ValidaSoloNumeros(id) {

							 if ((event.keyCode < 48) || (event.keyCode > 57)) 
							 	document.getElementById(""+id).value=null;
							}

							function cambiarMoneda(id)
							{
								var num=document.getElementById(""+id).value;
								num = Math.round(parseFloat(num)*Math.pow(20,2))/Math.pow(20,2)
								num += '';
								var splitStr = num.split('.');
								var splitLeft = splitStr[0];
								var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '';
								splitRight = splitRight + '00';
								splitRight = splitRight.substr(0,3);
								var regx = /(\d+)(\d{3})/;
								while (regx.test(splitLeft)) {
								splitLeft = splitLeft.replace(regx, '$1' + '.' + '$2');
								}
								var precio= splitLeft;

								document.getElementById(""+id).value=precio;
							}

						</script>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'precio',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Precio",'id'=>"precio",'onkeydown'=>"ValidaSoloNumeros('precio')",'onchange'=>"cambiarMoneda('precio')")); ?>
							
							<?php if($form->error($model,'precio')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"precio"); ?>')

									});
									
								</script>

							<?php endif; ?>

						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'metros_cuadrados',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Metros Cuadrados",'id'=>"metros",'onkeydown'=>"ValidaSoloNumeros('metros')",'onchange'=>"cambiarMoneda('metros')")); ?>
							
							<?php if($form->error($model,'metros_cuadrados')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"metros_cuadrados"); ?>')

									});
									
								</script>

							<?php endif; ?>

						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'pais',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"country",'readonly'=>true,'placeholder'=>"País")); ?>
							<?php if($form->error($model,'pais')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"pais"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'region',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"administrative_area_level_1",'readonly'=>true,'placeholder'=>"Región")); ?>
							<?php if($form->error($model,'region')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"region"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"locality",'readonly'=>true,'placeholder'=>"Ciudad")); ?>
							<?php if($form->error($model,'ciudad')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"ciudad"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'comuna',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"administrative_area_level_3",'readonly'=>true,'placeholder'=>"Comuna")); ?>
							<?php if($form->error($model,'comuna')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"comuna"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"route",'placeholder'=>"Dirección")); ?>
							<?php if($form->error($model,'direccion')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"direccion"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-6">

						<article>	
							<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Telefono de Contacto",'id'=>"telefono",'onkeydown'=>"ValidaSoloNumeros('telefono')")); ?>
							<?php if($form->error($model,'telefono')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"telefono"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<div class="col-xs-12">
						<article>	
							<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>1000,'class'=>"form-control",'placeholder'=>"Ingrese la descripción del Terreno")); ?>
							<?php if($form->error($model,'descripcion')): ?>


								<script type="text/javascript">
									
									$(document).ready(function(){

										toastr.error('<?php echo $form->error($model,"descripcion"); ?>')

									});
									
								</script>

							<?php endif; ?>
						</article>
						</div>

						<script type="text/javascript">

							function mostrarImagen1(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen1').show('slow');
							   $('#img_destino1').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}

							function mostrarImagen2(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen2').show('slow');
							   $('#img_destino2').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}

							function mostrarImagen3(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen3').show('slow');
							   $('#img_destino3').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}

							function mostrarImagen4(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen4').show('slow');
							   $('#img_destino4').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}

							function mostrarImagen5(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen5').show('slow');
							   $('#img_destino5').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}

							function mostrarImagen6(input) {
							 if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {

							   $('#div_imagen6').show('slow');
							   $('#img_destino6').attr('src', e.target.result);
							  }
							  reader.readAsDataURL(input.files[0]);
							 }
							}
							 
							$("#imagen1").change(function(){
							 mostrarImagen1(this);
							});

							$("#imagen2").change(function(){
							 mostrarImagen2(this);
							});

							$("#imagen3").change(function(){
							 mostrarImagen3(this);
							});

							$("#imagen4").change(function(){
							 mostrarImagen4(this);
							});

							$("#imagen5").change(function(){
							 mostrarImagen5(this);
							});

							$("#imagen6").change(function(){
							 mostrarImagen6(this);
							});

						</script>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen1',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen1",'onchange'=>"mostrarImagen1(this)")); ?>
							
								<div id="div_imagen1" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino1" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen1')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen1"); ?>')

										});
										
									</script>

								<?php endif; ?>
							</article>
						</div>

						<output id="list"></output>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen2',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen2",'onchange'=>"mostrarImagen2(this)")); ?>
								
								<div id="div_imagen2" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino2" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen2')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen2"); ?>')

										});
										
									</script>

								<?php endif; ?>

							</article>
						</div>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen3',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen3",'onchange'=>"mostrarImagen3(this)")); ?>
								<div id="div_imagen3" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino3" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen3')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen3"); ?>')

										});
										
									</script>

								<?php endif; ?>
							</article>
						</div>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen4',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen4",'onchange'=>"mostrarImagen4(this)")); ?>
								<div id="div_imagen4" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino4" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen4')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen4"); ?>')

										});
										
									</script>

								<?php endif; ?>
							</article>
						</div>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen5',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen5",'onchange'=>"mostrarImagen5(this)")); ?>
								<div id="div_imagen5" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino5" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen5')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen5"); ?>')

										});
										
									</script>

								<?php endif; ?>
							</article>
							
						</div>

						<div class="col-xs-6 col-sm-4">
							<article>
								<?php echo $form->fileField($model,'imagen6',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"imagen6",'onchange'=>"mostrarImagen6(this)")); ?>
								<div id="div_imagen6" hidden>
										<center><img class="img-responsive"  width="200px" id="img_destino6" src="#" alt="Tu imagen"></center>
								</div>

								<?php if($form->error($model,'imagen6')): ?>


									<script type="text/javascript">
										
										$(document).ready(function(){

											toastr.error('<?php echo $form->error($model,"imagen6"); ?>')

										});
										
									</script>

								<?php endif; ?>
							</article>
							
						</div>

						<div class="col-xs-12">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Publicar' : 'Publicar',array('class'=>'btn btn-primary','disabled'=>true,'id'=>"button_publicar")); ?>
						</div>

					</div>

				</div>				

			</div>
		</div>

	</div>
</div>

<?php $this->endWidget(); ?>


<?php include("footer.php"); ?>

<!-- SCRIPTS -->
<?php include("scripts.php"); ?>

</body>
</html>