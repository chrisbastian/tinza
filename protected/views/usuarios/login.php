<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

</head>

<style type="text/css">

.errorMessage{
display: none;
}

body {
    background-image: url(img/background.png);
}


</style>


<script type="text/javascript">
    
    $(document).ready(function(){

    $('#error').hide();

    $('#recovery').hide();

    $('#error_recovery').hide();

    $('#success_recovery').hide();

    

        <?php if(Yii::app()->user->hasFlash('error')):?>
            $('#error').fadeIn();
            setTimeout( "$('#error').fadeOut('slow');", 4000 );

        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('error_recovery')):?>
            $('#error_recovery').fadeIn();
            setTimeout( "$('#error_recovery').fadeOut('slow');", 4000 );
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('success_recovery')):?>
            $('#success_recovery').fadeIn();
            setTimeout( "$('#success_recovery').fadeOut('slow');", 4000 );
        <?php endif; ?>

        


        
    });

    function showRecovery()
    {
        $('#recovery').toggle('fadeIn');

    }

</script>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <br><br><br><br><br><br><br><br><br>

               <center>
                    <img width="100%"  src="<?php echo Yii::app()->theme->baseUrl; ?>/tinza_style/img/tinza-logo2.png" alt="" class="img-responsive">
               </center>

               <h3>Admin Tinza</h3>

            </div>
            <br>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'usuarios-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>

                <div id="error" class="alert alert-danger">
                    Sus datos son invalidos verifique su <a class="alert-link">Contraseña y/o Usuario</a>.
                </div>

                <div id="error_recovery" class="alert alert-danger">
                    No hemos podido recuperar su contraseña por las siguientras razones: 
                    <br>Sus datos son invalidos verifique su <a class="alert-link">Email</a>.
                </div>

                <div id="success_recovery" class="alert alert-success">
                    Hemos enviado su contraseña al correo proporcionado, verifique su <br><a class="alert-link">Bandeja de Entrada y/o Spam</a>.
                </div>

                <div class="form-group">
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Correo Electronico")); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Contraseña")); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>

                <div class="form-group">
                    <a onclick="showRecovery();" href="#">¿Perdiste tu contraseña?</a>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>
                <!--
                <p class="text-muted text-center"><small>¿No tienes una cuenta?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/registro');?>">Crear una cuenta</a>
                -->
            <?php $this->endWidget();  ?>

            <div id="recovery">
                <br>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'usuarios-form',
                    'action'=>Yii::app()->createUrl('//usuarios/recovery/'),

                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                )); ?>

                    <div class="form-group">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Ingresa tu Correo Electronico")); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary block full-width m-b">Recuperar Contraseña</button>
                    <!--
                    <p class="text-muted text-center"><small>¿No tienes una cuenta?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/registro');?>">Crear una cuenta</a>
                    -->
                <?php $this->endWidget();  ?>

                
            </div>


        </div>
    </div>
</body>

</html>
