<?php
/* @var $this InstitucionController */
/* @var $model INSTITUCION */
?>

<?php $base_url=Yii::app()->theme->baseUrl; ?>

<link href="<?php echo $base_url; ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo $base_url; ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">

<!--Javascript-->
<script src="<?php echo $base_url; ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $base_url; ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo $base_url; ?>/js/plugins/dataTables/dataTables.responsive.js"></script>

<style type="text/css">

    .form-inline .form-control {
    width: 100%;
    }

</style>

<script type="text/javascript">

$(document).ready(function(){

$('#message_simple').hide();

	<?php if(Yii::app()->user->hasFlash('error_delete')):?>
		$('#message_simple').fadeIn();
		setTimeout( "$('#message_simple').fadeOut('slow');", 2000 );

	<?php endif; ?>

});

</script>

<script type="text/javascript">

$("a[data-target=#network]").click(function(ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#network .modal-content").load(target, function() { 
         $("#network").modal("show"); 
    });
});

$('#network').on('hidden', function() {
    $('#network').removeData('modal');
});

</script>

<?php if(Yii::app()->session['rol']!="Cliente"): ?>

    <button style="float:right" type="button" onclick= " window.location='<?php echo Yii::app()->createAbsoluteUrl('/properties/create');?>' " class="btn btn-default"><i class="fa fa-key"></i>  Agregar Propiedad</button>

<?php endif; ?>
<br><br>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
                
            <div class="ibox-content">

            <section class="">

            <table id="id_table" class="table table-bordered table-hover dataTables-example" >

            <thead>
                <tr>
                    <th>
                        <input type="text" class="form-control" placeholder="EMPRESA O CLIENTE" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="CATASTRAL" />
                    </th>

                   <th>
                    <input type="text" class="form-control" placeholder="DIRECCIÓN" />
                   </th>

                    <th>
                        <input type="text" class="form-control" placeholder="ESTADO" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="MUNICIPIO" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="USO DE SUELO" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="CONSTRUCCIÓN" />
                    </th>


                    <?php if(Yii::app()->session['rol']=="Administrador"): ?>

                    <th>
                        
                    </th>

                    <?php endif; ?>

                    <?php if(Yii::app()->session['rol']=="Inscrito"): ?>

                    <th>
                        
                    </th>

                    <?php endif; ?>

                    
                </tr>
                <tr>
                    <th data-class="expand">EMPRESA O CLIENTE</th>

                    <th data-class="expand">CATASTRAL</th>
                    <th>DIRECCIÓN</th>
                    <th data-hide="phone,tablet">ESTADO</th>
                    <th data-hide="phone,tablet">MUNICIPIO</th>
                    <th data-hide="phone,tablet">USO DE SUELO</th>
                    <th data-hide="phone,tablet">CONSTRUCCIÓN</th>

                    <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <th data-hide="phone,tablet">Acciones</th>
                    <?php endif; ?>

                    <?php if(Yii::app()->session['rol']=="Empleado"): ?>
                        <th data-hide="phone,tablet">Acciones</th>
                    <?php endif; ?>
                </tr>

            </thead>
            <tbody>

            <?php if(Yii::app()->session['rol']=="Administrador"): ?>

                <?php $model=Properties::model()->findAll(); ?>

            <?php endif; ?>

            <?php if(Yii::app()->session['rol']=="Cliente"): ?>

                <?php 

                $model=Properties::model()->findAllByAttributes(array('id_profile'=>Yii::app()->session['id_usuario'])); 
                ?>

            <?php endif; ?>

            <?php if(Yii::app()->session['rol']=="Empleado"): ?>

                <?php 
                    $model=Properties::model()->findAllByAttributes(array('id_profile'=>Yii::app()->session['id_usuario'])); 
                ?>

            <?php endif; ?>
                    
                    <?php foreach ($model as $properties):?>
                    <tr>
                        <?php $model_usuario=Usuarios::model()->findAllByAttributes(array('id_usuario'=>$properties->id_profile)); ?>

                        <?php foreach ($model_usuario as $usuario): ?>
                            <td><?php echo $usuario->nombre; ?></td>
                        <?php endforeach ?>

                        <td><?php echo $properties->catastral; ?></td>
                        <td><?php echo $properties->street; ?></td>
                        <td>Nueva León</td>

                        <?php $model=City::model()->findAllByAttributes(array('id'=>$properties->id_city)); ?>

                        <?php foreach ($model as $city): ?>
                            <td><?php echo $city->city; ?></td>
                        <?php endforeach ?>

                        <?php $model=Identification::model()->findAllByAttributes(array('id_propertie'=>$properties->id)); ?>
                        <td>
                        <?php foreach ($model as $identifications): ?>

                            <?php $model=UseSoilType::model()->findAllByAttributes(array('id'=>$identifications->id_use_ground)); ?>
                                <?php foreach ($model as $use_soil): ?>
                                    <?php echo $use_soil->use_soil_type." - "; ?>
                                <?php endforeach; ?>
                        <?php endforeach ?>
                        </td>


                        <td><?php echo $properties->is_building; ?></td>

                        <?php if(Yii::app()->session['rol']=="Empleado"): ?>
                            <td>
                                <a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/update/'.$properties->id);?>"><i class="fa fa-edit text-navy"></i></a>
                            </td>
                        <?php endif; ?>


                        <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <td>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/update/'.$properties->id);?>"><i class="fa fa-edit text-navy"></i></a>

                            <?php /* ?>
                            <?php if($properties->bloqueado==0): ?>
                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de pausar la publicación de este Terreno?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/properties/bloquear/'.$properties->id);?>'
                            }

                            "><i class="fa fa-stop text-navy"></i></a>

                            <?php endif; ?>

                            <?php if($properties->bloqueado==1): ?>
                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de continuar la publicación de este Terreno?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/properties/desbloquear/'.$properties->id);?>'
                            }

                            "><i class="fa fa-check text-navy"></i></a>

                            <?php endif; ?>
                            */?>

                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de eliminar esta Propiedad?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/properties/eliminar/'.$properties->id);?>'
                            }

                            "><i class="fa fa-times text-navy"></i></a>

                            <a>  
                        
                        </td>                            
                        <?php endif; ?>


                    </tr>
                 <?php endforeach; ?>
            </tbody>
        </table>
      </section>
    </div>
</div>
</div>





