<!DOCTYPE html>
<html>

<head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <title><?php echo CHtml::encode($this->pageTitle); ?></title>

       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
       <meta name="apple-mobile-web-app-capable" content="yes">
       <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,700' rel='stylesheet' type='text/css'>

       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

       <!-- Morris -->
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

       <!-- Gritter -->
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
       
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css" rel="stylesheet">
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/tinza_style/css/styles2.css" rel="stylesheet">
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/tinza_style/css/jquery-ui.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/smoothness/jquery-ui-1.10.2.custom.min.css">

       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/chosen/chosen.css" rel="stylesheet">

       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
       <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>


<?php Yii::app()->clientScript->scriptMap=array(
        'jquery.js'=>false,
); ?>


<style type="text/css">

.chosen-select{
    width: 100%;
}

#id_table_length{
  display: none;
}

#id_table_info{
  display: none;
}

#id_table_filter{
  display: none;
}


.note-editable{
    height: 200px;
}

label{
  font-family: "Times New Roman", Georgia, Serif !important;
}

</style>

<!--Script datatable modificado por Chris ;) -->
<script type="text/javascript">
     $(document).ready(function(){

         $('.summernote').summernote({
         });

    });
     
    $(document).ready(function() {
                
        /* // DOM Position key index //
    
        l - Length changing (dropdown)
        f - Filtering input (search)
        t - The Table! (datatable)
        i - Information (records)
        p - Pagination (paging)
        r - pRocessing 
        < and > - div elements
        <"#id" and > - div with an id
        <"class" and > - div with a class
        <"#id.class" and > - div with an id and class
        
        Also see: http://legacy.datatables.net/usage/features
        */  

        /* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;

            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

        /* END BASIC */
        
        /* COLUMN FILTER  */
        var otable = $('#id_table').DataTable({
        
        });
        
                       
        // Apply the filter
        $("#id_table thead th input[type=text]").on( 'keyup change', function () {
            
            otable
                .column( $(this).parent().index()+':visible' )
                .search( this.value )
                .draw();
                
        } );
        /* END COLUMN FILTER */   
    
        /* COLUMN SHOW - HIDE */
       
        
        /* END COLUMN SHOW - HIDE */

        /* TABLETOOLS */
        $('#datatable_tabletools').dataTable({
            
            // Tabletools options: 
            //   https://datatables.net/extensions/tabletools/button_options
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oTableTools": {
                 "aButtons": [
                 "copy",
                 "csv",
                 "xls",
                    {
                        "sExtends": "pdf",
                        "sTitle": "SmartAdmin_PDF",
                        "sPdfMessage": "SmartAdmin PDF Export",
                        "sPdfSize": "letter"
                    },
                    {
                        "sExtends": "print",
                        "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                    }
                 ],
                "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
            "autoWidth" : true,
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_tabletools) {
                    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_datatable_tabletools.respond();
            }
        });
        
        /* END TABLETOOLS */
    
    })

    </script>

    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery-2.1.1.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/bootstrap.min.js'); ?>

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src=""></script>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/metisMenu/jquery.metisMenu.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>

    <!-- Validate -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/validate/jquery.validate.min.js'); ?>

        <!-- Flot -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/flot/jquery.flot.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/flot/jquery.flot.tooltip.min.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/flot/jquery.flot.spline.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/flot/jquery.flot.resize.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/flot/jquery.flot.pie.js'); ?>

    <!-- Peity -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/peity/jquery.peity.min.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/demo/peity-demo.js'); ?>


    <!-- Custom and plugin javascript -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/inspinia.js'); ?>

    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/datapicker/bootstrap-datepicker.js'); ?>

        <!-- jQuery UI -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/jquery-ui/jquery-ui.min.js'); ?>

        <!-- GITTER -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/gritter/jquery.gritter.min.js'); ?>

        <!-- EayPIE -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/easypiechart/jquery.easypiechart.js'); ?>

        <!-- Sparkline -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/sparkline/jquery.sparkline.min.js'); ?>

        <!-- Sparkline demo data  -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/demo/sparkline-demo.js'); ?>

        <!-- ChartJS-->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/chartJs/Chart.min.js'); ?>   

     <!-- Mainly scripts -->

     <!-- Custom and plugin javascript -->
     <!-- Chosen -->
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/chosen/chosen.jquery.js'); ?>  

    <!-- JSKnob -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/jsKnob/jquery.knob.js'); ?>  

    <!-- Input Mask-->
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/jasny/jasny-bootstrap.min.js'); ?>  

    <!-- Switchery -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/switchery/switchery.js'); ?>  

     <!-- IonRangeSlider -->
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/ionRangeSlider/ion.rangeSlider.min.js'); ?>  

     <!-- iCheck -->
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/iCheck/icheck.min.js'); ?> 

     <!--Summernote-->
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/summernote/summernote.min.js'); ?>  

     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/summernote/summernote.min.js'); ?>  
    
    <script type="text/javascript">

    $(document).ready(function(){ // When the DOM is Ready, then bind the click

    $('.nav li').click(function(e) {
            if(this.href.trim() == window.location){
                alert('Hola');
                $('.nav li').removeClass('active');
                $(this).addClass("active");
            }

        });
    });

    </script>

    <style type="text/css">

    .navbar-brand
    {
        background: url("<?php echo Yii::app()->theme->baseUrl; ?>/tinza_style/img/tinza-logo.png") no-repeat -35px top;
    }

    </style>

    <body class="infobar-offcanvas">

    <header id="topnav" class="navbar navbar-default navbar-fixed-top clearfix" role="banner">

        <nav class="navbar navbar-default">

          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav" style="background-color:#f1840f">
              <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/inicio');?>"><i class="fa fa-home"></i> Inicio</a></li>

              <?php if(Yii::app()->session['rol']!="Cliente"): ?>
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/admin');?>"><i class="fa fa-user"></i> Usuarios</a></li>
              <?php endif; ?>

              <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/admin');?>"><i class="fa fa-key"></i> Propiedades</a></li>
              <?php endif; ?>

              <?php if(Yii::app()->session['rol']!="Administrador"): ?>
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/cliente');?>"><i class="fa fa-key"></i> Propiedades</a></li>
              <?php endif; ?>

              <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/properties/busquedaAvanzada');?>"><i class="fa fa-search"></i> Búsqueda avanzada</a></li>
              
              <?php if(Yii::app()->session['rol']=="Administrador"): ?>
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/correos/admin');?>"><i class="fa fa-envelope-o"></i> Correos masivos</a></li>
              <?php endif; ?>
            </ul>
         
        </li>

      </ul>

      <ul class="nav navbar-nav toolbar pull-right">
          <!--
          <li class="dropdown toolbar-icon-bg">
              <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span class="badge badge-alizarin">5</span></a>
              <div class="dropdown-menu notifications arrow">
                  <div class="dd-header">
                      <span>Notifications</span>
                      <span><a href="#">Settings</a></span>
                  </div>
                  <div class="dd-footer">
                      <a href="#">View all notifications</a>
                  </div>
              </div>
          </li>
            -->

          <li class="dropdown">
              <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo Yii::app()->session['nombre']; ?></span>
              </a>
              <ul class="dropdown-menu userinfo">
                  <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/update/'.Yii::app()->session['id_usuario']);?>"><span class="pull-left">Perfil</span> <i class="pull-right fa fa-pencil"></i></a></li>
                  <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/logout');?>"><span class="pull-left">Salir</span> <i class="pull-right fa fa-sign-out"></i></a></li>
              </ul>
          </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
        <!--
        <ul class="nav navbar-nav">
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/admin');?>"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/admin');?>"><i class="fa fa-user"></i> Usuarios</a></li>
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/admin');?>"><i class="fa fa-key"></i> Propiedades</a></li>
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/admin');?>"><i class="fa fa-search"></i> Búsqueda avanzada</a></li>
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/terrenos/admin');?>"><i class="fa fa-envelope-o"></i> Correos masivos</a></li>
        </ul>

        <ul class="nav navbar-nav toolbar pull-right">
            <li class="dropdown toolbar-icon-bg">
                <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span class="badge badge-alizarin">5</span></a>
                <div class="dropdown-menu notifications arrow">
                    <div class="dd-header">
                        <span>Notifications</span>
                        <span><a href="#">Settings</a></span>
                    </div>
                    <div class="dd-footer">
                        <a href="#">View all notifications</a>
                    </div>
                </div>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                    <span class="hidden-xs"><?php echo Yii::app()->session['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu userinfo">
                    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/update/'.Yii::app()->session['id_usuario']);?>"><span class="pull-left">Edit Profile</span> <i class="pull-right fa fa-pencil"></i></a></li>
                    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/logout');?>"><span class="pull-left">Salir</span> <i class="pull-right fa fa-sign-out"></i></a></li>
                </ul>
            </li>
        </ul>
    -->

    </header>

    <div id="wrapper">
        <div id="layout-static">            
            <div class="static-content-wrapper">
                <div class="static-content">
                    <div class="page-content">

                        <?php /* ?>
                        <div class="page-heading">
                            <ul class="list-unstyled">
                                <li><a><i class="fa fa-user fa-2x"></i><?php echo "Usuarios"; ?></a></li>
                            </ul>
                        </div>
                        */?>
                        <br><br><br><br>

                        <div class="container-fluid">
                            <?php echo $content; ?>
                        </div> <!-- .container-fluid -->
                    </div> <!-- #page-content -->
                </div>                   
            </div>
        </div>
    </div>

     <footer role="contentinfo">
        <div class="clearfix">
            <h6 style="margin: 0;"> &copy; 2015. Tinza/Zarate Abogados. Todos los derechos reservados. Desarrolado por <a href="../../www.innomobs.com">Innomobs</a></h6>
        </div>
    </footer>
          
</body>
</html>

<script>
    $(document).ready(function(){

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
                var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();


</script>
