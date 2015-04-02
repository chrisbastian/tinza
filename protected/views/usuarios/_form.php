<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>



<?php $this->renderPartial('../script2'); ?>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.1.js"></script>


<div class="form-horizontal">

	<div class="form-group" id="locationField">
	  <input id="autocomplete" class="form-control" placeholder="¿Necesitas ayuda con tu ubicación?, Prueba buscandola en este campo." onFocus="geolocate()" type="text"></input>
	</div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),

)); ?>
<style type="text/css">

.errorMessage *{
color: red !important;
}

</style>	

<body onload="initialize()">
		<!--No eliminar, necesario para api de google-->
	  	<input type="hidden" class="field" id="street_number" disabled="true"></input>
	    <input type="hidden" class="field" id="postal_code" disabled="true"></input>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="form-group" id="locationField">
		<?php echo $form->labelEx($model,'dirección',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'dirección',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"route")); ?>
		</div>
		<?php echo $form->error($model,'dirección'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>"col-sm-4 control-label")); ?>
			<div class="col-sm-5">
				<input size="60" maxlength="500" class="form-control" name="Usuarios[nombre]" id="Usuarios_nombre" type="text" value="<?php echo $model->nombre; ?>">
			</div>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ciudad',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"locality")); ?>
		</div>
		<?php echo $form->error($model,'ciudad'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'telefono',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<input type="text" class="form-control" data-mask="56 (9) 999-999-99" name="Usuarios[telefono]" id="Usuarios_telefono" placeholder="" value="<?php echo $model->telefono; ?>">                      
		</div>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"administrative_area_level_1")); ?>
		</div>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pais',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'pais',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'id'=>"country")); ?>
		</div>
		<?php echo $form->error($model,'pais'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>"col-sm-4 control-label")); ?>
		<div class="col-sm-5">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
		</div>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<?php if(Yii::app()->session['rol']=="Administrador"): ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'rol',array('class'=>"col-sm-4 control-label")); ?>
			<div class="col-sm-5">
				<?php echo $form->dropDownList($model,'rol',array('Administrador'=>'Administrador','Inscrito'=>'Inscrito'),array('class'=>"form-control")); ?>
			</div>
			<?php echo $form->error($model,'rol'); ?>
		</div>

	<?php endif; ?>

	<?php if($model->isNewRecord): ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'password',array('class'=>"col-sm-4 control-label")); ?>

		    <div class="col-sm-5">
		    	<input size="60" maxlength="500" class="form-control" placeholder="Contraseña" name="Usuarios[password]" id="Usuarios_password" type="password" value="">
		    </div>
		    <?php echo $form->error($model,'password'); ?>
		</div>

	<?php endif; ?>

	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>	
</body>

<?php $this->endWidget(); ?>

</div><!-- form -->