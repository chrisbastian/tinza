

<!--Bootstrap-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/toastr/toastr.min.js"></script>

<div class="form-horizontal">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'usuarios-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),

    )); ?>

    <?php if($form->errorSummary($model)): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php endif; ?>

    <script type="text/javascript">

    function showFuente()
    {
        if($('#rol').val()=="Cliente")
        {
            $('#fuente_user').show();        
        }else
        {
            $('#fuente_user').hide();        

        }

    }

    </script>

    <?php echo $form->errorSummary($model); ?>
    
    <?php if($model->isNewRecord):  ?>

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Usuario</h4>
            </div>
        </div>

    <?php endif; ?>

    <?php if(!$model->isNewRecord):  ?>

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center"><?php echo $model->nombre; ?>: <?php echo $model->fecha_registro; ?></h4>
            </div>
        </div>

    <?php endif; ?>

    <div class="form-group">   
        <label for="id_user_type" class="col-sm-2 control-label">Tipo de Usuario</label>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model,'rol',array('Cliente'=>'Cliente','Empleado'=>'Empleado','Administrador'=>'Administrador'),array('class'=>"form-control",'placeholder'=>"Llene Este Campo...",'onchange'=>"showFuente()",'id'=>"rol")); ?>
        </div>

        <label for="company" class="col-sm-4 control-label">Empresa</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'empresa',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'empresa')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"empresa"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

    </div>

    <div class="form-group" id="fuente_user">
        <label for="id_fuente" class="col-sm-2 control-label">Fuente</label>
        <div class="col-sm-2">
            <div >
                <?php echo $form->dropDownList($model,'id_fuente',
                    CHtml::listData(Usuarios::model()->findAllByAttributes(array('rol'=>'Empleado')),'id_usuario','nombre'),array('class'=>"chosen-select")
                ); ?>            
            </div>
        </div>

    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'nombre')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"nombre"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="first_name" class="col-sm-2 control-label">Apellido Paterno</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'apellido_paterno',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'apellido_paterno')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"apellido_paterno"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="last_name" class="col-sm-2 control-label">Apellido Materno</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'apellido_materno',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'apellido_materno')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"apellido_materno"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="email" class="col-sm-2 control-label">Correo Electrónico</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'email')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"email"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="rfc" class="col-sm-2 control-label">RFC</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'rfc',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'rfc')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"rfc"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="phone" class="col-sm-2 control-label">Teléfonos</label>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Telefono")); ?>
            <?php if($form->error($model,'telefono')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"telefono"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <div class="col-sm-2">
            <?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Celular")); ?>
            <?php if($form->error($model,'celular')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"celular"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Domicilio</h4>
        </div>
    </div>

    <div class="form-group">
        <label for="street" class="col-sm-2 control-label">Calle</label>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'calle_domicilio',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'calle_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"calle_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="ext_number" class="col-sm-1 control-label">Número Ext.</label>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'num_ext_domicilio',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'num_ext_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"num_ext_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="int_number" class="col-sm-1 control-label">Número Int.</label>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'num_int_domicilio',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'num_int_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"num_int_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="neighborhood" class="col-sm-2 control-label">Colonia</label>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'colonia_domicilio',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'colonia_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"colonia_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="state" class="col-sm-1 control-label">Estado</label>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model,'estado_domicilio',array('Nuevo León'=>'Nuevo León'),array('class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'estado_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"estado_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>

        <label for="city" class="col-sm-1 control-label">Municipio</label>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model,'municipio_domicilio',
                CHtml::listData(City::model()->findAll(),'id','city'),array('class'=>"chosen-select")
            ); ?>

            <?php if($form->error($model,'municipio_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"municipio_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>

        </div>

        <label for="zip_code" class="col-sm-1 control-label">C.P.</label>
        <div class="col-sm-1">
            <?php echo $form->textField($model,'cp_domicilio',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
            <?php if($form->error($model,'cp_domicilio')): ?>

                <script type="text/javascript">
                    
                    $(document).ready(function(){

                        toastr.error('<?php echo $form->error($model,"cp_domicilio"); ?>')

                    });
                    
                </script>

            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <h4 class="text-center">Domicilio Fiscal <span>(opcional)</span></h4>  
        </div>
    </div> 

    <div class="fiscal">
        <div class="form-group">
            <label for="fiscal_street" class="col-sm-2 control-label">Calle</label>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'calle_fiscal',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'calle_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"calle_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
            </div>

            <label for="fiscal_ext_number" class="col-sm-1 control-label">Número Ext.</label>
            <div class="col-sm-2">
                <?php echo $form->textField($model,'num_ext_fiscal',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'num_ext_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"num_ext_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
             </div>

            <label for="fiscal_int_number" class="col-sm-1 control-label">Número Int.</label>
            <div class="col-sm-2">
                <?php echo $form->textField($model,'num_int_fiscal',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'num_int_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"num_int_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="fiscal_eighborhood" class="col-sm-2 control-label">Colonia</label>
            <div class="col-sm-2">
                <?php echo $form->textField($model,'colonia_fiscal',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'colonia_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"colonia_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
            </div>

            <label for="fiscal_state" class="col-sm-1 control-label">Estado</label>
            <div class="col-sm-2">
                <?php echo $form->dropDownList($model,'estado_fiscal',array('Nuevo León'=>'Nuevo León'),array('class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'estado_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"estado_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
            </div>

            <label for="fiscal_city" class="col-sm-1 control-label">Municipio</label>
            <div class="col-sm-2">
                <?php echo $form->dropDownList($model,'municipio_fiscal',
                    CHtml::listData(City::model()->findAll(),'id','city'),array('class'=>"chosen-select")
                ); ?>
            </div>

            <label for="fiscal_zip_code" class="col-sm-1 control-label">C.P.</label>
            <div class="col-sm-1">
                <?php echo $form->textField($model,'cp_fiscal',array('size'=>60,'maxlength'=>500,'class'=>"form-control",'placeholder'=>"Llene Este Campo...")); ?>
                <?php if($form->error($model,'cp_fiscal')): ?>

                    <script type="text/javascript">
                        
                        $(document).ready(function(){

                            toastr.error('<?php echo $form->error($model,"cp_fiscal"); ?>')

                        });
                        
                    </script>

                <?php endif; ?>
            </div>
        </div>

        
        <div class="form-group">

            <label for="id_user_type" class="col-sm-2 control-label">Fecha de Registro</label>
            <div class="col-sm-2">
                <?php echo $form->dateField($model,'fecha_registro',array('class'=>"form-control")); ?>
            </div>            
            
        </div>
            
    </div>

    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-default pull-right')); ?>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>

<?php $this->endWidget(); ?>



