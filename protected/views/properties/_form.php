<?php
/* @var $this PropertiesController */
/* @var $model Properties */
/* @var $form CActiveForm */
?>

<!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--Bootstrap-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
    
    function añadir()
    {
        $('#container_añadir > #añadir').each(function(i,e){
          $(this).clone().appendTo('#input_añadidos');
        });
    }

    function añadir_licensia()
    {
        $('#container_license > #license').each(function(i,e){
          $(this).clone().appendTo('#license_adds');
        });
    }

    function añadir_extra()
    {
        $('#container_extra > #extra').each(function(i,e){
          $(this).clone().appendTo('#extra_añadidos');
        });

    }

</script>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'properties-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),

)); ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->errorSummary($model_licenses); ?>
        <?php echo $form->errorSummary($model_identification); ?>
        <?php echo $form->errorSummary($model_extra_properties); ?>


        <div class="panel panel-default panel-create">
            <div class="panel-heading">
                <h2>Nueva propiedad</h2>
            </div>
            <div class="panel-body">

                <form method="post" class="form-horizontal">

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Propietario</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-3">
                            <?php echo $form->dropDownList($model,'id_profile',
                                CHtml::listData(Usuarios::model()->findAllByAttributes(array('rol'=>'Cliente')),'id_usuario','nombre'),array('class'=>"chosen-select")
                            ); ?>
                        </div>

                    </div>


                    <!-- Initiation: Ubicación -->
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Ubicación</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="street" class="col-sm-1 control-label">Calle</label>

                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Calle")); ?>
                                
                            <?php if($form->error($model,'street')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"street"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>     

                        <label for="ext_number" class="col-sm-1 control-label">Num ext.</label>
                        <div class="col-sm-1">
                            <?php echo $form->textField($model,'number_ext',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Num ext.")); ?>
                            
                            <?php if($form->error($model,'number_ext')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"number_ext"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="int_number" class="col-sm-1 control-label">Num int.</label>
                        <div class="col-sm-1">
                            <?php echo $form->textField($model,'number_int',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Num Int.")); ?>
                            
                            <?php if($form->error($model,'number_int')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"number_int"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="neighborhood" class="col-sm-1 control-label">Colonia</label>
                        <div class="col-sm-3">
                            <?php echo $form->textField($model,'neighborhood',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Colonia")); ?>

                            <?php if($form->error($model,'neighborhood')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"neighborhood"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="zip_code" class="col-sm-1 control-label">C.P.</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"C.P")); ?>

                            <?php if($form->error($model,'zip_code')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"zip_code"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="state" class="col-sm-1 control-label">Estado</label>
                        <div class="col-sm-3">
                            <?php echo $form->dropDownList($model,'id_state',array('Nuevo León'=>'Nuevo León'),array('class'=>"form-control")); ?>
                            
                            <?php if($form->error($model,'id_state')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"id_state"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <script type="text/javascript">

                            function change_city_map()
                            {
                                var option;
                                option = $("#city option:selected" ).text();

                                $('#address').val('Nuevo León,Mexico,'+option);

                                codeAddress();

                            }


                        </script>

                        <label for="city" class="col-sm-1 control-label">Municipio</label>
                        <div class="col-sm-3">
                                                   
                            <?php echo $form->dropDownList($model,'id_city',
                                CHtml::listData(City::model()->findAll(),'id','city'),array('class'=>"chosen-select",'onchange'=>'change_city_map()','id'=>"city")
                            ); ?>

                        </div>
                    </div>

                    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

                    <?php if($model->isNewRecord): ?>

                    <body>
                        <div hidden id="panel">
                          <input id="address" type="textbox" value="Monterrey,Mexico">
                        </div>
                        <div id="map-canvas"></div>  
                    </body>

                    <?php endif; ?>

                    <?php if(!$model->isNewRecord): ?>

                    <?php $city_update=City::model()->findAllByAttributes(array('id'=>$model->id_city)) ?>

                    <?php foreach ($city_update as $c): ?>
                        <?php $city=$c->city; ?>
                    <?php endforeach ?>
                    <body>
                        <div hidden id="panel">
                          <input id="address" type="textbox" value="Nuevo León,Mexico,<?php echo $city; ?>">
                        </div>
                        <div id="map-canvas"></div>  
                    </body>

                    <?php endif; ?>


                    <style>
                      html, body {
                        height: 100%;
                        margin: 0px;
                        padding: 0px
                      }

                      #map-canvas{
                        margin: 0px;
                        padding: 350px
                      }
                      #panel {
                        position: absolute;
                        top: 5px;
                        left: 50%;
                        margin-left: -180px;
                        z-index: 5;
                        background-color: #fff;
                        padding: 5px;
                        border: 1px solid #999;
                      }
                    </style>
                    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

                        <script>


                    var geocoder;
                    var map;
                    var markers = [];

                    $(document).ready(function(){
                      codeAddress();
                    });

                    function initialize() {
                      geocoder = new google.maps.Geocoder();
                      var latlng = new google.maps.LatLng(-34.397, 150.644);
                      var mapOptions = {
                        zoom: 15,
                        center: latlng
                      }
                      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                      codeAddress();
                    }

                    function setAllMap(map) {
                      for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                      }
                    }

                    function clearMarkers() {
                      setAllMap(null);
                    }

                    function codeAddress() {

                      clearMarkers();

                      var address= $('#address').val();
                      geocoder.geocode( { 'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                          map.setCenter(results[0].geometry.location);
                          var marker = new google.maps.Marker({
                              map: map,
                              draggable:true,
                              position: results[0].geometry.location,
                              animation:google.maps.Animation.BOUNCE,
                              mapTypeId: google.maps.MapTypeId.SATELLITE

                          });

                          
                        } else {
                          alert('Geocode was not successful for the following reason: ' + status);
                        }
                      });

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                      </script>

                    <!-- End: Ubicación -->

                    <!-- Initiation: Identificación -->
                    <div class="row">


                        <div class="col-md-12">
                            <h4>Identificación</h4><hr>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" value="<?php echo $model->catastral; ?>" name="catastral" data-mask="999-999-999" placeholder="Catastral">
                            </div>
                            <button class="btn btn-default" type="button" onclick="añadir();">
                            Añadir Nueva Identificación
                            </button><br><br>
                        </div>

                    </div>
                    <br><br>

            <?php if($model->isNewRecord): ?>

                <div id="container_añadir">

                    <div id="añadir">

                        <div class="form-group">

                            <label for="uso_suelo" class="col-sm-1 control-label">Uso de suelo</label>

                            <div class="col-sm-2">
                                <?php echo $form->dropDownList($model_identification,'id',
                                    CHtml::listData(UseSoilType::model()->findAll(),'id','use_soil_type'),array('class'=>"chosen-select",'name'=>"use_soil_type[]")
                                ); ?>
                            </div> 
                            

                            <label for="expedition_date" class="col-sm-1 control-label">Expedición</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $model_identification->soil_date_expedition; ?>" type="date" name="expedition_date_identification[]" data-mask="9999/99/99">
                            </div>

                            <label for="expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $model_identification->soil_date_expiration; ?>" type="date" name="expiration_date_identification[]" data-mask="9999/99/99">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="identification_documen" class="col-sm-1 control-label">Documentos</label>
                            <div class="col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group">
                                        
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <input type="file" name="identification_document[]" value="<?php echo $model_identification->document_identification; ?>">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

            <?php if(!$model->isNewRecord): ?>

                <div hidden id="container_añadir">

                    <div id="añadir">

                        <div class="form-group">

                            <label for="uso_suelo" class="col-sm-1 control-label">Uso de suelo</label>

                            <?php $model_identification_up=new Identification; ?>

                            <div class="col-sm-2">
                                <?php echo $form->dropDownList($model_identification_up,'id',
                                    CHtml::listData(UseSoilType::model()->findAll(),'id','use_soil_type'),array('class'=>"chosen-select",'name'=>"use_soil_type[]")
                                ); ?>
                            </div> 
                            

                            <label for="expedition_date" class="col-sm-1 control-label">Expedición</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $model_identification_up->soil_date_expedition; ?>" type="date" name="expedition_date_identification[]" data-mask="9999/99/99">
                            </div>

                            <label for="expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $model_identification_up->soil_date_expiration; ?>" type="date" name="expiration_date_identification[]" data-mask="9999/99/99">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="identification_documen" class="col-sm-1 control-label">Documentos</label>
                            <div class="col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group">
                                        
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <input type="file" name="identification_document[]" value="<?php echo $model_identification_up->document_identification; ?>">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            <?php endif; ?>



            <?php if(!$model->isNewRecord): ?>

            <?php foreach ($model_identification as $m): ?>
                    
                <div id="container_añadir_update">

                    <div id="añadir_update">

                        <div class="form-group">

                            <label for="uso_suelo" class="col-sm-1 control-label">Uso de suelo</label>

                            <div class="col-sm-2">
                                <?php echo $form->dropDownList($m,'id',
                                    CHtml::listData(UseSoilType::model()->findAll(),'id','use_soil_type'),array('class'=>"chosen-select",'name'=>"use_soil_type[]")
                                ); ?>
                            </div> 
                            

                            <label for="expedition_date" class="col-sm-1 control-label">Expedición</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $m->soil_date_expedition; ?>" type="date" name="expedition_date_identification[]" data-mask="9999/99/99">
                            </div>

                            <label for="expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?php echo $m->soil_date_expiration; ?>" type="date" name="expiration_date_identification[]" data-mask="9999/99/99">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="identification_documen" class="col-sm-1 control-label">Documentos</label>
                            <div class="col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group">
                                        
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <input type="file" name="identification_document[]" value="<?php echo $m->document_identification; ?>">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <?php endforeach ?>

            <?php endif; ?>


                    <div id="input_añadidos"></div>
                    <!-- End: Identificación -->

                    <!-- Initiation: Licencias -->
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Licencias</h4>
                            <hr>
                            <button class="btn btn-default" type="button" onclick="añadir_licensia();">
                            Añadir Nueva Licensia
                            </button><br><br>
                        </div>
                    </div>

            <?php if($model->isNewRecord): ?>

            <div id="container_license">
                <div id="license">
                    <div class="form-group">
                        <label for="type_license" class="col-sm-1 control-label">Tipo de licencia</label>
                        <div class="col-sm-2">
                            <?php echo $form->dropDownList($model_licenses,'id',
                                CHtml::listData(LicenseType::model()->findAll(),'id','license_type'),array('class'=>"chosen-select",'name'=>"type_license[]")
                            ); ?>
                        </div>

                        <label for="license_expedition_date" class="col-sm-1 control-label">Expedición</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $model_licenses->lic_date_expedition; ?>" type="date" name="expedition_date_license[]" data-mask="9999/99/99">
                        </div>

                        <label for="license_expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $model_licenses->lic_date_expiration; ?>" type="date" name="expiration_date_license[]" data-mask="9999/99/99">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_documen" class="col-sm-1 control-label">Documentos</label>
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group">
                                    
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            <input type="file" name="license_document[]" value="<?php echo $model_licenses->id_document; ?>">
                                        </span>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>

            <?php if(!$model->isNewRecord): ?>

            <div hidden id="container_license">
                <div id="license">
                    <div class="form-group">
                        <label for="type_license" class="col-sm-1 control-label">Tipo de licencia</label>
                        
                        <?php $model_licenses_up=new Licenses; ?>

                        <div class="col-sm-2">
                            <?php echo $form->dropDownList($model_licenses_up,'id',
                                CHtml::listData(LicenseType::model()->findAll(),'id','license_type'),array('class'=>"chosen-select",'name'=>"type_license[]")
                            ); ?>
                        </div>

                        <label for="license_expedition_date" class="col-sm-1 control-label">Expedición</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $model_licenses_up->lic_date_expedition; ?>" type="date" name="expedition_date_license[]" data-mask="9999/99/99">
                        </div>

                        <label for="license_expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $model_licenses_up->lic_date_expiration; ?>" type="date" name="expiration_date_license[]" data-mask="9999/99/99">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_documen" class="col-sm-1 control-label">Documentos</label>
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group">
                                    
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            <input type="file" name="license_document[]" value="<?php echo $model_licenses_up->id_document; ?>">
                                        </span>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>


        <?php if(!$model->isNewRecord): ?>

            <?php foreach ($model_licenses as $m): ?>
                
            <div id="container_license_update">
                <div id="license_update">
                    <div class="form-group">
                        <label for="type_license" class="col-sm-1 control-label">Tipo de licencia</label>
                        <div class="col-sm-2">
                            <?php echo $form->dropDownList($m,'id',
                                CHtml::listData(LicenseType::model()->findAll(),'id','license_type'),array('class'=>"chosen-select",'name'=>"type_license[]")
                            ); ?>
                        </div>

                        <label for="license_expedition_date" class="col-sm-1 control-label">Expedición</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $m->lic_date_expedition; ?>" type="date" name="expedition_date_license[]" data-mask="9999/99/99">
                        </div>

                        <label for="license_expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                        <div class="col-sm-2">
                            <input class="form-control" value="<?php echo $m->lic_date_expiration; ?>" type="date" name="expiration_date_license[]" data-mask="9999/99/99">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_documen" class="col-sm-1 control-label">Documentos</label>
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group">
                                    
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            <input type="file" name="license_document[]" value="<?php echo $m->id_document; ?>">
                                        </span>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?> 

        <?php endif; ?>



            <div id="license_adds"></div>
                    <!-- End: Licencias -->

                    <!-- Initiation: Lineamientos de contrucción -->
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Lineamientos de contrucción</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cos" class="col-sm-2 control-label">COS</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'cos',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Cos")); ?>
                            
                            <?php if($form->error($model,'cos')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"cos"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="cus" class="col-sm-2 control-label">CUS</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'cus',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Cus")); ?>
                            
                            <?php if($form->error($model,'cus')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"cus"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="cas" class="col-sm-1 control-label">CAS</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'cas',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Cas")); ?>
                            
                            <?php if($form->error($model,'cas')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"cas"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group">

                        <label for="is_building" class="col-sm-2 control-label">Construcción</label>
                        <div class="col-sm-2">

                                <?php

                                $status = array('Construcción'=>'Construcción', 'Terreno'=>'Terreno');
                                echo $form->radioButtonList($model,'is_building',$status,
                                array('separator'=>'',
                                'labelOptions'=>array('class'=>'control-label'), // add this code
                                ));
                                ?>

                        </div>                   

                        <label for="ground_surface" class="col-sm-2 control-label">Superficie de terreno</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'surface',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Superficie de Terreno")); ?>
                                <span class="input-group-addon">m<sup>2</sup></span>

                                <?php if($form->error($model,'surface')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"surface"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div>

                         <label for="slope" class="col-sm-1 control-label">Pendiente</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'slope',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Pendiente")); ?>
                                <span class="input-group-addon">%</span>

                                <?php if($form->error($model,'slope')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"slope"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="remetimiento_frontal" class="col-sm-2 control-label">Remetimiento frontal</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_forntal',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Frontal")); ?>
                                <span class="input-group-addon">m</span>

                                <?php if($form->error($model,'remetimiento_frontal')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"remetimiento_frontal"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div> 

                        <label for="remetimiento_posterior" class="col-sm-2 control-label">Remetimiento posterior</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_posterior',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Posterior")); ?>
                                <span class="input-group-addon">m</span>

                                <?php if($form->error($model,'remetimiento_posterior')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"remetimiento_posterior"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div>  
                    </div>

                    <div class="form-group">
                        <label for="remetimiento_derecho" class="col-sm-2 control-label">Remetimiento derecho</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_derecho',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Derecho")); ?>
                                <span class="input-group-addon">m</span>

                                <?php if($form->error($model,'remetimiento_derecho')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"remetimiento_derecho"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div>

                        <label for="remetimiento_izquierdo" class="col-sm-2 control-label">Remetimiento izquierdo</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_izquierdo',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Izquierdo")); ?>
                                <span class="input-group-addon">m</span>

                                <?php if($form->error($model,'remetimiento_izquierdo')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"remetimiento_izquierdo"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                            </div>
                        </div>  
                    </div>

                    <div class="form-group">
                        <label for="parking" class="col-sm-2 control-label">Estacionamiento</label>
                        <div class="col-sm-2" style="margin-top: -7px;">
                            <?php

                            $status = array('Si'=>'Si', 'No'=>'No');
                            echo $form->radioButtonList($model,'has_parking',$status,
                            array('separator'=>'',
                            'labelOptions'=>array('class'=>'control-label'), // add this code
                            ));
                            ?>

                            <?php if($form->error($model,'has_parking')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"has_parking"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="parking_description" class="col-sm-1 control-label">Descripción</label>
                        <div class="col-sm-3">
                            <?php echo $form->textArea($model,'parking_description',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Descripción")); ?>

                            <?php if($form->error($model,'parking_description')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"parking_description"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="parking_matrix" class="col-sm-4 control-label">Matriz de estacionamiento</label>
                        <div class="col-sm-3">
                            <?php echo $form->fileField($model,'id_parking_document',array('size'=>60,'maxlength'=>500,'class'=>"form-control")); ?>
                            
                            <?php if($form->error($model,'id_parking_document')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"id_parking_document"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="urban_incorporation" class="col-sm-2 control-label">Incorporación urbana</label>
                        <div class="col-sm-2" style="margin-top: -7px;">
                            <?php

                            $status = array('Si'=>'Si', 'No'=>'No');
                            echo $form->radioButtonList($model,'has_urban_incorporation',$status,
                            array('separator'=>'',
                            'labelOptions'=>array('class'=>'control-label'), // add this code
                            ));
                            ?>

                            <?php if($form->error($model,'has_urban_incorporation')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"has_urban_incorporation"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>

                        <label for="parking_matrix" class="col-sm-1 control-label">Descripción</label>
                        <div class="col-sm-3">
                            <?php echo $form->textArea($model,'urban_incorporation_description',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Descripción")); ?>

                            <?php if($form->error($model,'urban_incorporation_description')): ?>

                                <script type="text/javascript">
                                    
                                    $(document).ready(function(){

                                        toastr.error('<?php echo $form->error($model,"urban_incorporation_description"); ?>')

                                    });
                                    
                                </script>

                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="height_limit" class="col-sm-2 control-label">Límite de altura</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'urban_height_limit',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Limite de Altura")); ?>

                                <?php if($form->error($model,'urban_height_limit')): ?>

                                    <script type="text/javascript">
                                        
                                        $(document).ready(function(){

                                            toastr.error('<?php echo $form->error($model,"urban_height_limit"); ?>')

                                        });
                                        
                                    </script>

                                <?php endif; ?>

                                <span class="input-group-addon">m</span>
                            </div>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">

                            <button class="btn btn-default" type="button" onclick="añadir_extra();">
                            Añadir Nuevo Extra
                            </button><br><br>    

                        </div>                
                    </div>

                <?php if($model->isNewRecord): ?>

                <div id="container_extra">

                    <div id="extra">

                        <div class="form-group">
                            <label for="extra_title" class="col-sm-1 control-label"><ins>Título</ins></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="extra_title[]" value="<?php echo $model_extra_properties->title; ?>">
                            </div>

                            <label for="extra_description" class="col-sm-1 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="extra_description[]" placeholder="Descripción"><?php echo $model_extra_properties->description; ?></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <?php endif; ?>

                <?php if(!$model->isNewRecord): ?>

                <div hidden id="container_extra">

                    <div id="extra">

                        <?php $extra=new ExtraProperties; ?>

                        <div class="form-group">
                            <label for="extra_title" class="col-sm-1 control-label"><ins>Título</ins></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="extra_title[]" value="<?php echo $extra->title; ?>">
                            </div>

                            <label for="extra_description" class="col-sm-1 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="extra_description[]" placeholder="Descripción"><?php echo $extra->description; ?></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <?php endif; ?>


            <?php if(!$model->isNewRecord): ?>

                <?php foreach ($model_extra_properties as $ex): ?>
                    
                <div id="container_extra_update">

                    <div id="extra_update">

                        <div class="form-group">
                            <label for="extra_title" class="col-sm-1 control-label"><ins>Título</ins></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="extra_title[]" value="<?php echo $ex->title; ?>">
                            </div>

                            <label for="extra_description" class="col-sm-1 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="extra_description[]" placeholder="Descripción"><?php echo $ex->description; ?></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            <?php endif; ?>

                <div id="extra_añadidos"></div>
                    <!-- End: Lineamientos de contrucción -->

                    <!-- Initiation: Lineamientos de contrucción -->

                    <!--
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Régimen urbanístico</h4>
                            <hr>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        Checkboxs - leyes
                    </div>
                    -->

                    <div class="panel-footer">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
                    </div>
                </form>
            </div>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->