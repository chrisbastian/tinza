<?php
/* @var $this PropertiesController */
/* @var $model Properties */
/* @var $form CActiveForm */
?>

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
                                CHtml::listData(Usuarios::model()->findAll(),'usuario','nombre'),array('class'=>"chosen-select")
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
                        </div>     

                        <label for="ext_number" class="col-sm-1 control-label">Num ext.</label>
                        <div class="col-sm-1">
                            <?php echo $form->textField($model,'number_ext',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Num ext.")); ?>
                        </div>

                        <label for="int_number" class="col-sm-1 control-label">Num int.</label>
                        <div class="col-sm-1">
                            <?php echo $form->textField($model,'number_int',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Num Int.")); ?>
                        </div>

                        <label for="neighborhood" class="col-sm-1 control-label">Colonia</label>
                        <div class="col-sm-3">
                            <?php echo $form->textField($model,'neighborhood',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Colonia")); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="zip_code" class="col-sm-1 control-label">C.P.</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"C.P")); ?>

                        </div>

                        <label for="state" class="col-sm-1 control-label">Estado</label>
                        <div class="col-sm-3">
                            <?php echo $form->dropDownList($model,'id_state',array('Aguascalientes'=>'Nuevo León'),array('class'=>"form-control")); ?>
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

                    <body>
                        <div hidden id="panel">
                          <input id="address" type="textbox" value="Monterrey,Mexico">
                        </div>
                        <div id="map-canvas"></div>  
                    </body>

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
                                <input type="text" class="form-control" name="catastral" data-mask="999-999-999" placeholder="Catastral">
                            </div>
                            <button class="btn btn-default" type="button" onclick="añadir();">
                            Añadir Nueva Identificación
                            </button><br><br>
                        </div>

                    </div>
                    <br><br>

                <div id="container_añadir">

                    <div id="añadir">

                        <div class="form-group">

                            <label for="uso_suelo" class="col-sm-1 control-label">Uso de suelo</label>
                            <div class="col-sm-2">
                                <select class="chosen-select" name="uso_suelo[]">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Unifamiliar</option>
                                    <option value="2">Multifamiliar</option>
                                    <option value="3">Servicios</option>
                                    <option value="4">Equipamiento privado</option>
                                    <option value="5">Equipamiento público</option>
                                    <option value="6">Comercial</option>
                                    <option value="7">Habitacional</option>
                                    <option value="8">Industrial</option>
                                    <option value="9">Agropecuario</option>
                                    <option value="10">Forestal</option>
                                    <option value="11">Áreas verdes</option>
                                    <option value="12">No tiene uso de suelo</option>
                                </select>
                            </div> 

                            <label for="expedition_date" class="col-sm-1 control-label">Expedición</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="date" name="expedition_date_identification[]" data-mask="99/99/9999">
                            </div>

                            <label for="expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="date" name="expiration_date_identification[]" data-mask="99/99/9999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="identification_documen" class="col-sm-1 control-label">Documentos</label>
                            <div class="col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-btn">
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="identification_document[]">
                                            </span>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

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

            <div id="container_license">
                <div id="license">
                    <div class="form-group">
                        <!--<label for="type_license" class="col-sm-1 control-label">Tipo de licencia</label>-->
                        <div class="col-sm-3">
                            <select name="type_license[]" class="chosen-select">
                                <option value="0">Tipo de licencia</option>
                                <option value="1">Uso de suelo</option>
                                <option value="2">Licencia de construcción</option>
                                <option value="3">Licencia de uso de edificación</option>
                                <option value="4">Certificado de libertad de gravámen</option>
                            </select>
                        </div>

                        <label for="license_expedition_date" class="col-sm-1 control-label">Expedición</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="date" name="expedition_date_license[]" data-mask="99/99/9999">
                        </div>

                        <label for="license_expiration_date" class="col-sm-1 control-label">Vencimiento</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="date" name="expiration_date_license[]" data-mask="99/99/9999">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_documen" class="col-sm-1 control-label">Documentos</label>
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group">
                                    <div class="form-control uneditable-input" data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="license_documen">
                                        </span>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                        </div>

                        <label for="cus" class="col-sm-2 control-label">CUS</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'cus',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Cus")); ?>
                        </div>

                        <label for="cas" class="col-sm-1 control-label">CAS</label>
                        <div class="col-sm-2">
                            <?php echo $form->textField($model,'cas',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Cas")); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="is_building" class="col-sm-2 control-label">Construcción</label>
                        <div class="col-sm-2">

                                <?php

                                $status = array('Si'=>'Si', 'No'=>'No');
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
                            </div>
                        </div>

                         <label for="slope" class="col-sm-1 control-label">Pendiente</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'slope',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Pendiente")); ?>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="remetimiento_frontal" class="col-sm-2 control-label">Remetimiento frontal</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_forntal',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Frontal")); ?>
                                <span class="input-group-addon">m</span>
                            </div>
                        </div> 

                        <label for="remetimiento_posterior" class="col-sm-2 control-label">Remetimiento posterior</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_posterior',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Posterior")); ?>
                                <span class="input-group-addon">m</span>
                            </div>
                        </div>  
                    </div>

                    <div class="form-group">
                        <label for="remetimiento_derecho" class="col-sm-2 control-label">Remetimiento derecho</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_derecho',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Derecho")); ?>
                                <span class="input-group-addon">m</span>
                            </div>
                        </div>

                        <label for="remetimiento_izquierdo" class="col-sm-2 control-label">Remetimiento izquierdo</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'remetimiento_izquierdo',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Remetimiento Izquierdo")); ?>
                                <span class="input-group-addon">m</span>
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
                        </div>

                        <label for="parking_description" class="col-sm-1 control-label">Descripción</label>
                        <div class="col-sm-3">
                            <?php echo $form->textArea($model,'parking_description',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Descripción")); ?>

                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="parking_matrix" class="col-sm-4 control-label">Matriz de estacionamiento</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="parking_matrix">
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
                        </div>

                        <label for="parking_matrix" class="col-sm-1 control-label">Descripción</label>
                        <div class="col-sm-3">
                            <?php echo $form->textArea($model,'urban_incorporation_description',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Descripción")); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="height_limit" class="col-sm-2 control-label">Límite de altura</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <?php echo $form->textField($model,'urban_height_limit',array('size'=>60,'maxlength'=>100,'class'=>"form-control",'placeholder'=>"Limite de Altura")); ?>

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


                <div id="container_extra">

                    <div id="extra">

                        <div class="form-group">
                            <label for="extra_title" class="col-sm-1 control-label"><ins>Título</ins></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="extra_title">
                            </div>

                            <label for="extra_description" class="col-sm-1 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="extra_description">
                            </div>
                        </div>

                    </div>

                </div>

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