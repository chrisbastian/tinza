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

<script type="text/javascript">
        
        function check_all(){

        var checkboxes = $('#tabla_checkboxes').find(':checkbox');
        if($('#select_all').is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }

    }

</script>

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
                        <center><input id="select_all" onchange="check_all()" type="checkbox" class="form-control"></center>
                    </th>
                    <th>
                        <input type="text" class="form-control" placeholder="EMPRESA" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="CONTACTO" />
                    </th>

                   <th>
                    <input type="text" class="form-control" placeholder="CORREO ELECTRÓNICO" />
                   </th>

                    <th>
                        <input type="text" class="form-control" placeholder="MUNICIPIO" />
                    </th>

                    <th>
                        <input type="text" class="form-control" placeholder="ESTADO" />
                    </th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th data-class="expand">EMPRESA</th>
                    <th data-class="expand">CONTACTO</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th data-hide="phone,tablet">MUNICIPIO</th>
                    <th data-hide="phone,tablet">ESTADO</th>
                </tr>

            </thead>
            <tbody id="tabla_checkboxes">
                <?php $model=Usuarios::model()->findAll(); ?>
                <?php foreach ($model as $us): ?>
                    <tr>
                        <td class="col-sm-1"><input name="checkboxes" type="checkbox" class="form-control" value="<?php echo $us->id_usuario; ?>"></td>
                        <td><?php echo $us->empresa; ?></td>
                        <td><?php echo $us->nombre; ?></td>
                        <td><?php echo $us->email; ?></td>

                        <?php $model=City::model()->findAllByAttributes(array('id'=>$us['municipio_domicilio'])); ?>

                        <?php foreach ($model as $city): ?>
                            <td><?php echo $city->city; ?></td>
                        <?php endforeach ?>

                        <td><?php echo $us->estado_domicilio; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <center><button data-toggle="modal" data-target="#modal" class="btn btn-default">SELECCIONAR</button></center>

      </section>
    </div>
</div>
</div>

<script type="text/javascript">
    
    function enviar_mensaje()
    {
        var de_mensaje = $('#de_mensaje').val()
        var bcc_mensaje = $('#bcc_mensaje').val()
        var titulo_mensaje = $('#titulo_mensaje').val()
        var descripcion_mensaje = $('#descripcion_mensaje').val()
        var i=1;
        var id_checkboxes=[];

        $('input[name="checkboxes"]:checked').each(function() {
           id_checkboxes[+i-1]=$(this).val();
           i++;
        });
            
            $.ajax({
            type:"POST",
            url: $("#mensaje").attr("action"),
            data: {de_mensaje:de_mensaje,bcc_mensaje:bcc_mensaje,titulo_mensaje:titulo_mensaje,descripcion_mensaje:descripcion_mensaje,id_checkboxes:id_checkboxes},
            beforeSend: function (){
            },
            success: function(resp)
            {
                    $('body').attr('disabled',false).html(resp);
            }

        });


    }

</script>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO MENSAJE</h4>
      </div>
      <div class="modal-body">
        <form id="mensaje" action="../../correos/enviarMensaje">
          <div class="form-group">
            <label for="recipient-name" class="control-label">DE:</label>
            <input type="text" class="form-control" id="de_mensaje" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">BCC:</label>
            <input type="text" class="form-control" id="bcc_mensaje" required>
          </div>

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