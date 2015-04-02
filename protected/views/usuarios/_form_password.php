<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
    
    $(document).ready(function(){

    $('#error').hide();
    $('#error_vacio').hide();
    $('#success').hide();

        <?php if(Yii::app()->user->hasFlash('error')):?>
            $('#error').fadeIn();
            setTimeout( "$('#error').fadeOut('slow');", 4000 );
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('error_vacio')):?>
            $('#error_vacio').fadeIn();
            setTimeout( "$('#error_vacio').fadeOut('slow');", 4000 );
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('success')):?>
            $('#success').fadeIn();
            setTimeout( "$('#success').fadeOut('slow');", 4000 );
        <?php endif; ?>

        
    });

</script>

<div class="form-horizontal">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'usuarios-form',
		'action'=>Yii::app()->createUrl('//usuarios/password/'.$model->id_usuario),
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
		
		<div id="error" class="alert alert-danger" hidden>
		    Las <a class="alert-link">contraseñas</a> no coinciden.
		</div>

		<div id="error_vacio" class="alert alert-danger" hidden>
		    La <a class="alert-link">Contraseña</a> no puede estar vacia.
		</div>

		<div id="success" class="alert alert-success" hidden>
		   	<a class="alert-link">Contraseña</a> guardada con exito.
		</div>

		<h4>Cambiar Contraseña</h4><hr>

		<div class="form-group">
			<?php echo $form->labelEx($model,'password',array('class'=>"col-sm-4 control-label")); ?>

		    <div class="col-sm-5">
		    	<input size="60" maxlength="500" class="form-control" placeholder="Contraseña" name="Usuarios[password]" id="Usuarios_password" type="password" value="">
		    </div>
		    <?php echo $form->error($model,'password'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'confirmar_password',array('class'=>"col-sm-4 control-label")); ?>

		    <div class="col-sm-5">
		    	<?php echo $form->passwordField($model,'confirmar_password',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Confirmar Contraseña")); ?>
		    </div>
		    <?php echo $form->error($model,'confirmar_password'); ?>
		</div>

	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
			<button class="btn btn-primary" type="submit">Cambiar Contraseña</button>
		</div>
	</div>	

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>