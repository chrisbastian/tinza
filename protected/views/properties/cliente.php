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

<?php if(Yii::app()->session['rol']=="Cliente"): ?>
    <button style="float:right" type="button" onclick= " window.location='<?php echo Yii::app()->createAbsoluteUrl('/properties/create');?>' " class="btn btn-default"><i class="fa fa-key"></i>  Agregar Propiedad</button>
    <button style="float:right" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal"><i class="fa fa-envelope"></i>  Enviar Correo</button>
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
                    $model=Properties::model()->findAllByAttributes(array('id_fuente'=>Yii::app()->session['id_usuario'])); 
                ?>

            <?php endif; ?>
                    
                    <?php foreach ($model as $properties):?>
                    <tr>
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
                                    <?php echo $use_soil->use_soil_type; ?>
                                    <br>
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

        <div class="alert alert-success" role="alert" id="success_mensaje_solicitud" hidden>
          <center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          <span class="sr-only">Exito:</span>
          ¡Gracias por contactarnos! Nos pondremos en contacto contigo lo antes posible.</center>
        </div>

    <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title" id="panel-title"><center>Requiero agregar una nueva propiedad. Favor de contactarme para darle seguimiento a mi solicitud.</center><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
          </div>
          <div class="panel-body">
            <center><button type="button" onclick=" var r=confirm('¿Estas seguro de enviar la solicitud?'); if(r==true){window.location='../../solictudes/ingresarSolicitud'}" class="btn btn-default">SOLICITUD DE NUEVO INGRESO</button></center>
          </div>
        </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        <?php if(Yii::app()->user->hasFlash('successSolicitud')):?>
            $('#success_mensaje_solicitud').fadeIn();
            setTimeout( "$('#success_mensaje_solicitud').fadeOut('slow');", 4000 );
        <?php endif; ?>
    });

    function enviar_mensaje()
    {
        var titulo_mensaje = $('#titulo_mensaje').val()
        var descripcion_mensaje = $('#descripcion_mensaje').val()

            if(titulo_mensaje=="" || descripcion_mensaje=="")
            {
                $('#error_mensaje').fadeIn();
                setTimeout( "$('#error_mensaje').fadeOut('slow');", 4000 );
            }else
            {
                   $.ajax({
                   type:"POST",
                   url: $("#mensaje").attr("action"),
                   data: {titulo_mensaje:titulo_mensaje,descripcion_mensaje:descripcion_mensaje},
                   beforeSend: function (){
                   },
                   success: function(resp)
                   {                            
                          if(resp=="error")
                          {
                            $('#error_mensaje').fadeIn();
                            setTimeout( "$('#error_mensaje').fadeOut('slow');", 4000 );
                          }

                          if(resp=="success")
                          {
                            $('#success_mensaje').fadeIn();
                            setTimeout( "$('#success_mensaje').fadeOut('slow');", 4000 );

                            $('#titulo_mensaje').val("");
                            $('#descripcion_mensaje').val("");
                          }  
                   }

               }); 
            }

            


    }

</script>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope"></i> NUEVO MENSAJE</h4>
        <br>
        <div class="alert alert-danger" role="alert" id="error_mensaje" hidden>
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Por favor rellena los campos...
        </div>

        <div class="alert alert-success" role="alert" id="success_mensaje" hidden>
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          <span class="sr-only">Exito:</span>
          ¡Gracias por contactarnos! Nos pondremos en contacto contigo lo antes posible.
        </div>

      </div>
      <div class="modal-body">
        <form id="mensaje" action="../../correos/enviarMensajeCliente">
          <div class="form-group">
            <label for="message-text" class="control-label">TITULO:</label>
            <input type="text" class="form-control" id="titulo_mensaje" required>
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">DESCRIPCIÓN:</label>
            <textarea class="form-control" id="descripcion_mensaje" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="enviar_mensaje()" class="btn btn-primary">Enviar mensaje</button>
      </div>
    </div>
  </div>
</div>





