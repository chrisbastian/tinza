<?php
/* @var $this TerrenosController */
/* @var $model Terrenos */
/* @var $form CActiveForm */
?>

<?php $this->renderPartial('../script'); ?>

<div class="form-horizontal">

	<div class="form-group" id="locationField">
	  <input id="autocomplete" class="form-control" placeholder="¿Necesitas ayuda con tu ubicación?, Prueba buscandola en este campo." onFocus="geolocate()" type="text"></input>
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

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if(Yii::app()->session['rol']=="Administrador"): ?>

		<div class="form-group">
				<label class="col-sm-4 control-label" for="Productos_id_desarrollador">Vendedor</label>		

			<div class="col-sm-5">
				<?php echo $form->dropDownList($model,'id_vendedor',
			        CHtml::listData(Usuarios::model()->findAll(),'usuario','nombre'),array('class'=>"chosen-select")
			    ); ?>
			</div>

		    <?php echo $form->error($model,'id_vendedor'); ?>
		</div>

	<?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen1',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen1',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen1'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen2',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen2',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen2'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen3',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen3',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen3'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen4',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen4',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen4'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen5',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen5',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen5'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen6',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->fileField($model,'imagen6',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'imagen6'); ?>
	</div>




	<div class="form-group">
		<?php echo $form->labelEx($model,'precio',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'precio',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Precio",'id'=>"precio",'onkeydown'=>"ValidaSoloNumeros('precio')",'onchange'=>"cambiarMoneda('precio')")); ?>
		</div>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'metros_cuadrados',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'metros_cuadrados',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Metros Cuadrados",'id'=>"metros",'onkeydown'=>"ValidaSoloNumeros('metros')",'onchange'=>"cambiarMoneda('metros')")); ?>
		</div>
		<?php echo $form->error($model,'metros_cuadrados'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pais',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'pais',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"country",'readonly'=>true)); ?>
		</div>
		<?php echo $form->error($model,'pais'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'region',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'region',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"administrative_area_level_1",'readonly'=>true)); ?>
		</div>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ciudad',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"locality",'readonly'=>true)); ?>
		</div>
		<?php echo $form->error($model,'ciudad'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'comuna',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'comuna',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"administrative_area_level_3",'readonly'=>true)); ?>
		</div>
		<?php echo $form->error($model,'comuna'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'direccion',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'id'=>"route")); ?>
		</div>
		<?php echo $form->error($model,'direccion'); ?>
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'telefono',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Telefono de Contacto",'id'=>"telefono",'onkeydown'=>"ValidaSoloNumeros('telefono')")); ?>
		</div>
		<?php echo $form->error($model,'telefono'); ?>
	</div>



	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>1000,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->