


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


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-key"></i> Administrar Propiedades</h5>
            </div>
            <div class="ibox-content">

            <section class="">

            <table id="id_table" class="table table-bordered table-hover dataTables-example" >

            <thead>
                <tr>
                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Titulo" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Precio" />
                    </th>

                   <th>
                    <input type="text" class="form-control" placeholder="Filtrar por Región" />
                   </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Ciudad" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Comúna" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Vendedor" />
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
                    <th data-class="expand">Titulo</th>

                    <th data-class="expand">Precio</th>
                    <th>Región</th>
                    <th data-hide="phone,tablet">Ciudad</th>
                    <th data-hide="phone,tablet">Comuna</th>
                    <th data-hide="phone,tablet">Vendedor</th>

                    <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <th data-hide="phone,tablet">Acciones</th>
                    <?php endif; ?>

                    <?php if(Yii::app()->session['rol']=="Inscrito"): ?>
                        <th data-hide="phone,tablet">Acciones</th>
                    <?php endif; ?>
                </tr>

            </thead>
            <tbody>

            <?php if(Yii::app()->session['rol']=="Administrador"): ?>

                <?php $model=Terrenos::model()->findAll(); ?>

            <?php endif; ?>

            <?php if(Yii::app()->session['rol']=="Inscrito"): ?>

                <?php $model=Terrenos::model()->findAllByAttributes(array('id_vendedor'=>Yii::app()->session['usuario'])); ?>

            <?php endif; ?>
            
                    <?php foreach ($model as $terrenos):?>
                    <tr>
                        <td><?php echo $terrenos->titulo; ?></td>
                        <td><?php echo $terrenos->precio; ?></td>
                        <td><?php echo $terrenos->region; ?></td>
                        <td><?php echo $terrenos->ciudad; ?></td>
                        <td><?php echo $terrenos->comuna; ?></td>
                        <td><?php echo $terrenos->id_vendedor; ?></td>

                        <?php if(Yii::app()->session['rol']=="Inscrito"): ?>
                            <td>
                                <a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/update/'.$terrenos->id_terreno);?>"><i class="fa fa-edit text-navy"></i></a>
                            </td>
                        <?php endif; ?>


                        <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <td>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/update/'.$terrenos->id_terreno);?>"><i class="fa fa-edit text-navy"></i></a>

                            <?php if($terrenos->bloqueado==0): ?>
                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de pausar la publicación de este Terreno?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/terrenos/bloquear/'.$terrenos->id_terreno);?>'
                            }

                            "><i class="fa fa-stop text-navy"></i></a>

                            <?php endif; ?>

                            <?php if($terrenos->bloqueado==1): ?>
                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de continuar la publicación de este Terreno?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/terrenos/desbloquear/'.$terrenos->id_terreno);?>'
                            }

                            "><i class="fa fa-check text-navy"></i></a>

                            <?php endif; ?>

                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de eliminar este Terreno?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/terrenos/eliminar/'.$terrenos->id_terreno);?>'
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





