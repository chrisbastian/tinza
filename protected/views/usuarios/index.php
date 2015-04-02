<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Experiencia Laboral</title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/css/font-awesome.min.css">

    <!-- Google Font Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900,300italic,100italic,400italic,500italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Style.css -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- NEVEGACIÓN -->
<nav>
  <ul>
    <?php if(Yii::app()->session['id_usuario']): ?>
      <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/update/'.Yii::app()->session['id_usuario']);?>"><i class="fa fa-user"></i> Mi perfil</a></li>
    <?php endif; ?>

    <?php if(!Yii::app()->session['id_usuario']): ?>
      <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/login');?>"><i class="fa fa-user"></i> Mi Perfil</a></li>
    <?php endif; ?>

    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/registro');?>"><i class="fa fa-edit"></i> Registrar</a></li>
    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usuarios/ingresoEmpresa');?>"><i class="fa fa-key"></i> Llave</a></li>
  </ul>
</nav>


<!-- WRAP-LOGO -->
<section id="logo">
  <span>
    <img class="img-responsive center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/logo.png" alt="Logotipo Experiencia Laboral">
  </span>
</section>
      
<div class="hr2"></div>

<!-- SLIDER'S FADE EDU-->
<section>
  <div id="Carousel" class="carousel slide carousel-fade">

    <div class="carousel-inner">
      <div class="item active">
        <img class="img-responsive center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-slide1.jpg" class="img-responsive">
      </div>
    </div>

  </div>
</section>

<!-- HR1 -->
<div class="hr1"><div class="color4"></div><div class="color3"></div></div>


<!-- SEPARADORES -->
<h1 class="text-center">UNA HERRAMIENTA DE GRAN VALOR</h1>
<div class="separadores">
  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-hr-left.png" alt=""><div class="color3">EXPERIENCIA</div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-hr-right.png" alt="">
  <hr class="center-block">
</div>

<!-- VIDEO -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="videoYoutube center-block">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/8K5NXW2vMLI" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ICONOS -->
<section class="color3 wrap-iconos">
  <div class="container">
    <div class="row">
      
      <img style="margin-bottom: 15px" class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-triangulo.png" alt="">

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="wrap-iconos-circle center-block">
          <i class="fa fa-user"></i>
        </div>
        <h3>Título del contenido</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolorem repellat quae ut pariatur repudiandae aliquid repellendus sapiente suscipit hic, aspernatur. Obcaecati fuga necessitatibus laboriosam vel.</p>
      </div><!--/.col-->

    </div><!--/.row-->
  </div><!--/.container-->
</section>

<!-- SEPARADORES -->
<h1 class="text-center">SÍGUENOS Y ENTÉRATE EN LAS REDES</h1>
<div class="separadores">
  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-hr-left.png" alt=""><div class="color3">CONTACTO</div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/img/gb-hr-right.png" alt="">
  <hr class="center-block">
</div>



<!--/////////////////////////////////////
  LIBRERÍAS
/////////////////////////////////////-->  
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/js/html5shiv.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/js/modernizr.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/js/respond.js"></script>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/experiencia_style/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
  </script>

</body>
</html>