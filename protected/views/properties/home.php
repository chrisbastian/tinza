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

function show_permisos()
{
    if($('#tipo_permisos').val()=="suelo")
    {   
        $('#contenedor_tabla_licenses').hide();
        $('#contenedor_tabla_identification').show();
    }

    if($('#tipo_permisos').val()=="licensia")
    {   
        $('#contenedor_tabla_identification').hide();
        $('#contenedor_tabla_licenses').show();
    }
}
</script>

<h4>PERMISOS PRÓXIMOS A VENCERSE</h4><hr>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-2">
            <select id="tipo_permisos" class="form-control" onchange="show_permisos()">
                <option value="null">Seleccionar Tipo de Permisos</option>
                <option value="suelo">Uso de Suelo</option>
                <option value="licensia">Licensia</option>

            </select>
        </div>
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
                
            <div class="ibox-content">

            <section class="">

            <div id="contenedor_tabla_identification" hidden>

            <table id="id_table" class="table table-bordered table-hover dataTables-example" >

                        <thead>
                            <tr>
                                <th>
                                    <input type="text" class="form-control" placeholder="CATASTRAL" />
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="EMPRESA" />
                                </th>

                               <th>
                                <input type="text" class="form-control" placeholder="CONTACTO" />
                               </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="TELÉFONO" />
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="CORREO ELECTRONICO" />
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="MUNICIPIO" />
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="TIPO DE PERMISO" />
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="FECHA DE VENCIMIENTO" />
                                </th>
                            </tr>
                            <tr>
                                <th data-class="expand">CATASTRAL</th>

                                <th data-class="expand">EMPRESA</th>
                                <th>CONTACTO</th>
                                <th data-hide="phone,tablet">TELÉFONO</th>
                                <th data-hide="phone,tablet">CORREO ELECTRNICO</th>
                                <th data-hide="phone,tablet">MUNICIPIO</th>
                                <th data-hide="phone,tablet">TIPO DE PERMISO</th>
                                <th data-hide="phone,tablet">FECHA DE VENCIMIENTO</th>
                            </tr>

                        </thead>
                        <tbody>

                        <?php if(Yii::app()->session['rol']=="Administrador"): ?>

                        <?php $model = Yii::app()->db->createCommand()
                            ->select('p.*,i.*')
                            ->from('identification i,properties p')
                            ->where('i.id_propertie=p.id') 
                            ->queryAll(); ?>
                        <?php endif; ?>

                        <?php if(Yii::app()->session['rol']=="Cliente"): ?>

                           <?php $model = Yii::app()->db->createCommand()
                               ->select('p.*,l.*,i.*')
                               ->from('licenses l,identification i,properties p')
                               ->where('l.id_propertie=p.id OR i.id_propertie=p.id') 
                               ->queryAll(); ?>
                           <?php endif; ?>


                        <?php if(Yii::app()->session['rol']=="Empleado"): ?>

                           <?php $model = Yii::app()->db->createCommand()
                               ->select('p.*,l.id as id_license,i.id as id_identification')
                               ->from('licenses l,identification i,properties p')
                               ->where('l.id_propertie=p.id OR i.id_propertie=p.id') 
                               ->queryAll(); ?>

                        <?php endif; ?>
                                
                                <?php foreach ($model as $properties):?>
                                <tr>
                                    <td><?php echo $properties['catastral']; ?></td>

                                    <?php $model_usuario=Usuarios::model()->findAllByAttributes(array('id_usuario'=>$properties['id_profile'])); ?>

                                    <?php foreach ($model_usuario as $usuario): ?>
                                        <td><?php echo $usuario->empresa; ?></td>
                                        <td><?php echo $usuario->nombre; ?></td>
                                        <td><?php echo $usuario->telefono; ?></td>
                                        <td><?php echo $usuario->email; ?></td>

                                    <?php endforeach ?>

                                    <?php $model=City::model()->findAllByAttributes(array('id'=>$properties['id_city'])); ?>

                                    <?php foreach ($model as $city): ?>
                                        <td><?php echo $city->city; ?></td>
                                    <?php endforeach ?>

                                    <?php $model=UseSoilType::model()->findAllByAttributes(array('id'=>$properties['id_use_ground'])); ?>

                                    <?php foreach ($model as $key): ?>
                                        <td><?php echo $key['use_soil_type']; ?></td>
                                    <?php endforeach ?>

                                    <td><?php echo $properties['soil_date_expiration'] ?></td>

                                </tr>
                             <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
      </section>

          <script type="text/javascript">

              $(document).ready(function() {

                  var otable = $('#id_table_license').DataTable({
                  
                  });
                  
                        
                  // Apply the filter
                  $("#id_table_license thead th input[type=text]").on( 'keyup change', function () {
                      
                      otable
                          .column( $(this).parent().index()+':visible' )
                          .search( this.value )
                          .draw();
                          
                  } );
              } );
          </script>        

          <style type="text/css">
              #id_table_license_length{
                display: none;
              }

              #id_table_license_info{
                display: none;
              }

              #id_table_license_filter{
                display: none;
              }
          </style>

          <div id="contenedor_tabla_licenses">

          <table id="id_table_license" class="table table-bordered table-hover dataTables-example" >

          <thead>
              <tr>
                  <th>
                      <input type="text" class="form-control" placeholder="CATASTRAL" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="EMPRESA" />
                  </th>

                 <th>
                  <input type="text" class="form-control" placeholder="CONTACTO" />
                 </th>

                  <th>
                      <input type="text" class="form-control" placeholder="TELÉFONO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="CORREO ELECTRONICO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="MUNICIPIO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="TIPO DE PERMISO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="FECHA DE VENCIMIENTO" />
                  </th>
              </tr>
              <tr>
                  <th data-class="expand">CATASTRAL</th>

                  <th data-class="expand">EMPRESA</th>
                  <th>CONTACTO</th>
                  <th data-hide="phone,tablet">TELÉFONO</th>
                  <th data-hide="phone,tablet">CORREO ELECTRNICO</th>
                  <th data-hide="phone,tablet">MUNICIPIO</th>
                  <th data-hide="phone,tablet">TIPO DE PERMISO</th>
                  <th data-hide="phone,tablet">FECHA DE VENCIMIENTO</th>
              </tr>

          </thead>
          <tbody>

          <?php if(Yii::app()->session['rol']=="Administrador"): ?>

          <?php $model = Yii::app()->db->createCommand()
              ->select('p.*,l.*')
              ->from('licenses l,properties p')
              ->where('l.id_propertie=p.id') 
              ->queryAll(); ?>
          <?php endif; ?>

          <?php if(Yii::app()->session['rol']=="Cliente"): ?>

             <?php $model = Yii::app()->db->createCommand()
                 ->select('p.*,l.*,i.*')
                 ->from('licenses l,identification i,properties p')
                 ->where('l.id_propertie=p.id OR i.id_propertie=p.id') 
                 ->queryAll(); ?>
             <?php endif; ?>


          <?php if(Yii::app()->session['rol']=="Empleado"): ?>

             <?php $model = Yii::app()->db->createCommand()
                 ->select('p.*,l.id as id_license,i.id as id_identification')
                 ->from('licenses l,identification i,properties p')
                 ->where('l.id_propertie=p.id OR i.id_propertie=p.id') 
                 ->queryAll(); ?>

          <?php endif; ?>
                  
                  <?php foreach ($model as $properties):?>
                  <tr>
                      <td><?php echo $properties['catastral']; ?></td>

                      <?php $model_usuario=Usuarios::model()->findAllByAttributes(array('id_usuario'=>$properties['id_profile'])); ?>

                      <?php foreach ($model_usuario as $usuario): ?>
                          <td><?php echo $usuario->empresa; ?></td>
                          <td><?php echo $usuario->nombre; ?></td>
                          <td><?php echo $usuario->telefono; ?></td>
                          <td><?php echo $usuario->email; ?></td>

                      <?php endforeach ?>

                      <?php $model=City::model()->findAllByAttributes(array('id'=>$properties['id_city'])); ?>

                      <?php foreach ($model as $city): ?>
                          <td><?php echo $city->city; ?></td>
                      <?php endforeach ?>

                      <?php $model=LicenseType::model()->findAllByAttributes(array('id'=>$properties['type_license'])); ?>

                      <?php foreach ($model as $key): ?>
                          <td><?php echo $key['license_type']; ?></td>
                      <?php endforeach ?>

                      <td><?php echo $properties['lic_date_expiration'] ?></td>

                  </tr>
               <?php endforeach; ?>
          </tbody>
      </table>
    </div>


          <h4>PROPIEDADES AGREGADAS RECIENTEMENTE</h4><hr>

          <script type="text/javascript">
              $(document).ready(function() {

                  var otable = $('#id_table_propiedades').DataTable({
                  
                  });
                  
                        
                  // Apply the filter
                  $("#id_table_propiedades thead th input[type=text]").on( 'keyup change', function () {
                      
                      otable
                          .column( $(this).parent().index()+':visible' )
                          .search( this.value )
                          .draw();
                          
                  } );
              } );
          </script>        

          <style type="text/css">
              #id_table_propiedades_length{
                display: none;
              }

              #id_table_propiedades_info{
                display: none;
              }

              #id_table_propiedades_filter{
                display: none;
              }
          </style>

          <table id="id_table_propiedades" class="table table-bordered table-hover dataTables-example" >

          <thead>
              <tr>

                  <th>
                      <input type="text" class="form-control" placeholder="CATASTRAL" />
                  </th>

                 <th>
                  <input type="text" class="form-control" placeholder="UBICACIÓN" />
                 </th>

                  <th>
                      <input type="text" class="form-control" placeholder="MUNICIPIO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="ESTADO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="USO DE SUELO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="TERRENO O CONSTRUCCIÓN" />
                  </th>
                  
              </tr>
              <tr>
                  <th data-class="expand">CATASTRAL</th>
                  <th>UBICACIÓN</th>
                  <th data-hide="phone,tablet">MUNICIPIO</th>
                  <th data-hide="phone,tablet">ESTADO</th>
                  <th data-hide="phone,tablet">USO DE SUELO</th>
                  <th data-hide="phone,tablet">TERRENO O CONSTRUCCIÓN</th>
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

                      <td><?php echo $properties->catastral; ?></td>
                      <td><?php echo $properties->street; ?></td>

                      <?php $model=City::model()->findAllByAttributes(array('id'=>$properties->id_city)); ?>

                      <?php foreach ($model as $city): ?>
                          <td><?php echo $city->city; ?></td>
                      <?php endforeach ?>

                      <td>Nueva León</td>

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
                  </tr>
               <?php endforeach; ?>
          </tbody>
      </table>

          <h4>CLIENTES SOLICITANDO REGISTRO DE NUEVA PROPIEDAD</h4><hr>

          <script type="text/javascript">
              $(document).ready(function() {

                  var otable = $('#id_table_solicitudes').DataTable({
                  
                  });
                  
                        
                  // Apply the filter
                  $("#id_table_solicitudes thead th input[type=text]").on( 'keyup change', function () {
                      
                      otable
                          .column( $(this).parent().index()+':visible' )
                          .search( this.value )
                          .draw();
                          
                  } );
              } );
          </script>        

          <style type="text/css">
              #id_table_solicitudes_length{
                display: none;
              }

              #id_table_solicitudes_info{
                display: none;
              }

              #id_table_solicitudes_filter{
                display: none;
              }
          </style>

          <table id="id_table_solicitudes" class="table table-bordered table-hover dataTables-example" >

          <thead>
              <tr>

                  <th>
                      <input type="text" class="form-control" placeholder="EMPRESA" />
                  </th>

                 <th>
                  <input type="text" class="form-control" placeholder="CONTACTO ADMINISTRATIVO" />
                 </th>

                  <th>
                      <input type="text" class="form-control" placeholder="CORREO ELECTRÓNICO" />
                  </th>

                  <th>
                      <input type="text" class="form-control" placeholder="TELÉFONO" />
                  </th>                  
              </tr>
              <tr>
                  <th data-class="expand">CATASTRAL</th>
                  <th>CONTACTO ADMINISTRATIVO</th>
                  <th data-hide="phone,tablet">CORREO ELECTRÓNICO</th>
                  <th data-hide="phone,tablet">TELÉFONO</th>
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>

                  </tr>
               <?php endforeach; ?>
          </tbody>
      </table>
</div>
</div>













