<?php get_header(); ?>

<style>
   .wrap-top div.top-img{
    background: center center no-repeat;
    background-size: cover;
   }

   .wrap-top div.top-img:hover {
    background: left;
    background-size: cover;
   }

   #contenido img {
    height: auto;
    max-width: 100%;
   }

   #extracto p,h1,h2,h3,h4,h5,h6{
    color: #666;
   }

   p > a >i.fa {
    color: #a41215;
   }
    
  #gb-portada{
    background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg-top.jpg');
  }

  #gb-portada section  {
    height: 300px;
  }

  #gb-portada img {
  margin-top: -25px;
  max-width: 250px;
  }

  .bloque h3 {
    margin: 0;
  }
</style>

<div id="gb-portada">
  <section>
    <div id="gb-menu-top">
      <a href="http://enetpromundial.com/p">Ingresar</a> | <a href="#">Otra información</a>
    </div>

    <div class="text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" class="img-responsive center-block">
    </div>
  </section>
</div>

<?php get_template_part( 'inc/nav');?>

<div class="container mt">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
  <div class="row">
    
    <div class="col-xs-12 col-sm-7 bloque">
        <h3><?php the_title(); ?></h3>
        <div style="border-right:1px solid #EDEBEB">
            <?php
                if ( has_post_thumbnail() ) { 
                      the_post_thumbnail('wide',array('class'=>'img-responsive center-block mt'));
                }
            ?>

            <article class="text-center"><small><i class="fa fa-calendar"></i> Publicada: <?php the_time('j F, Y') ?></small>  <small><i class="fa fa-user"> Autor: <?php the_author(); ?> </i></small></article>
            <h2 class="text-center">Comparte</h2>
            <p>Puedes compartir esta información en las redes sociales, o bien, guardar un registro en tu correo</p>
              <p>
                <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title() ?>" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;"><i class="fa fa-facebook"></i></a> Facebook |
                <a href="http://twitter.com/intent/tweet?source=webclient&text=<?php the_title() ?> <?php the_permalink(); ?>" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;"><i class="fa fa-twitter"></i></a> Twitter |
                <a href="mailto:?subject=Enetpro%20-%20<?php the_title(); ?>&body=Puedes%20revisar%20el%20contenido%20en%20el%20siguiente%20enlace%20<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a> Guarda en tu correo
              </p>
            <hr>
        </div>
        
        <div id="contenido">
            <?php the_content(); ?>
        </div>

        <?php endwhile; else: ?>
          <p><?php _e('No hay entradas .'); ?></p>
        <?php endif; ?>
    </div><!--/.col-9-->

    <div class="col-xs-12 col-sm-5">
      <section class="bloque">
        <div class="row wrap-sidebar">
          <div class="col-xs-12">
            <?php get_template_part( 'sidebar');?>
          </div>
        </div>
      </section>
    </div><!--/.col-4-->
  </div><!--/.row-->
</div><!--/.container-fluid-->

<?php get_footer(); ?>

<!-- SCRIPTS -->
<?php get_template_part( 'scripts'); ?>

</body>
</html>