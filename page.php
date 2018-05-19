<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper py-5" id="page-wrapper">

	<?php while ( have_posts() ) : the_post(); ?>		

	<div class="carousel">
  		<div class="carousel-inner">
    		<div class="carousel-item active">
    			<?php if(!has_post_thumbnail()) : ?>
    			<img class="d-block w-100" src="<?php header_image(); ?>">
    			<?php else : ?>
    			<?php the_post_thumbnail('full',$attr = array('class'=>'d-block w-100')); ?>
    			<?php endif; ?>
      			<div class="carousel-caption d-none d-md-block">      				
    				<h1 class="display-4 d-none d-lg-block text-dark">
    					<span class="text-uppercase"><?php echo substr(get_the_title(),0,1) ?><span class="small"><?php echo substr(get_the_title(),1) ?></span></span>
    				</h1>    								
  				</div>
  			</div>
  		</div>
	</div>

	<?php endwhile; // end of the loop. ?>

	<div class="<?php echo esc_attr( $container ); ?> py-5" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
