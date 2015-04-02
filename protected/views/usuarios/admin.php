


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
                <h5><i class="fa fa-users"></i> Administrar Usuarios</h5>
                
            </div>
            <div class="ibox-content">

            <section class="">

            <table id="id_table" class="table table-bordered table-hover dataTables-example" >

            <thead>
                <tr>
                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Pais" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Nombre" />
                    </th>

                   <th>
                    <input type="text" class="form-control" placeholder="Filtrar por Ciudad" />
                   </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Correo" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="Filtrar por Rol" />
                    </th>

                    <?php if(Yii::app()->session['rol']=="Administrador"): ?>

                    <th>
                        
                    </th>

                    <?php endif; ?>

                    
                </tr>
                <tr>
                    <th data-class="expand">Pais</th>

                    <th data-class="expand">Nombre</th>
                    <th>Ciudad</th>
                    <th data-hide="phone,tablet">Correo</th>
                    <th data-hide="phone,tablet">Rol</th>

                    <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <th data-hide="phone,tablet">Acciones</th>
                    <?php endif; ?>
                </tr>

            </thead>
            <tbody>
            <?php $model=Usuarios::model()->findAll(); ?>
            
                    <?php foreach ($model as $usuarios):?>
                    <tr>
                        <td><?php echo $usuarios->pais; ?></td>
                        <td><?php echo $usuarios->nombre; ?></td>
                        <td><?php echo $usuarios->ciudad; ?></td>
                        <td><?php echo $usuarios->email; ?></td>
                        <td><?php echo $usuarios->rol; ?></td>
                        <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                        <td>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/update/'.$usuarios->id_usuario);?>"><i class="fa fa-edit text-navy"></i></a>
                            <a 
                            onclick="
                            var r=confirm('¿Estas seguro de eliminar este usuario?');
                            if(r==true)
                            {
                                window.location.href='<?php echo Yii::app()->createAbsoluteUrl('/usuarios/eliminar/'.$usuarios->id_usuario);?>'
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





