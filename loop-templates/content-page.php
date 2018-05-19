<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		
		<?php $bc=array_reverse(get_ancestors($post->ID,'page')) ?>
		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php if ( !is_front_page() ) : ?>
  	<li class="breadcrumb-item"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home','fotobook' ); ?>"><?php esc_html_e( 'Home','fotobook' ); ?></a></li>
	<?php endif ?>
  	<?php foreach ($bc as $i => $ancestor) { ?>
  		<li class="breadcrumb-item"><a href="<?php echo get_permalink($ancestor) ?>"><?php echo get_the_title($ancestor) ?></a></li>
  	<?php } ?>    
    <li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
  </ol>
</nav>

	</header><!-- .entry-header -->	

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'fotobook' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'fotobook' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
