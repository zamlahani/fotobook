<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fotobook
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="bg-secondary py-5">
   <div class="container">
   <div class="row">
      <?php for ($i=1; $i < 4; $i++) { ?>         
      
      <div class="col-lg col-sm-6 mb-3">
         <?php wp_nav_menu(
            array(
                  'theme_location'  => 'footer-'.$i,
                  'container'         => 'nav',                
                  'container_class'         => 'footer-menu ', 
                  'depth'  => 1,
                  'fallback_cb'     => '',
            )
         ); ?>
      </div>

      <?php } ?>
      
      <div class="col-lg d-sm-none d-xl-block"></div>
      <div class="col-lg col-sm-6">
         <div class="footer-menu">
            <a href="http://www.facebook.com/<?php echo esc_attr(get_theme_mod( 'fotobook_facebook_username', 'kuzaru' )); ?>" target="_blank">
               <i class="fa fa-facebook-square fa-lg fa-fw"></i>
            </a><a href="http://www.instagram.com/<?php echo esc_attr(get_theme_mod( 'fotobook_instagram_username', 'kuskuszamzam' )); ?>/" target="_blank">
               <i class="fa fa-instagram fa-lg fa-fw"></i>
            </a><a href="http://twitter.com/<?php echo esc_attr(get_theme_mod( 'fotobook_twitter_username', 'kuskus_maskus' )); ?>" target="_blank">
               <i class="fa fa-twitter-square fa-lg fa-fw"></i>
            </a><br><br>
            <img src="<?php echo esc_url(get_theme_mod('fotobook_footer_logo_url',get_template_directory_uri().'/img/z_zamlahani.png')) ?>" class="rounded" height="100" width="100">
         </div>
      </div>
   </div>
</div>
</div>

<div class="wrapper bg-secondary text-center" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

							<a href="<?php  echo esc_url( __( 'http://wordpress.org/','fotobook' ) ); ?>"><?php printf( 
							/* translators:*/
							esc_html__( 'Proudly powered by %s', 'fotobook' ),'WordPress' ); ?></a>
								<span class="sep"> | </span>
					
							<?php printf( // WPCS: XSS ok.
							/* translators:*/
								esc_html__( 'Theme: %1$s by %2$s.', 'fotobook' ), $the_theme->get( 'Name' ),  '<a href="'.esc_url( __('http://www.zamlahani.com', 'fotobook')).'">Khussal Zamlahani</a>' ); ?>
				
							(<?php printf( // WPCS: XSS ok.
							/* translators:*/
								esc_html__( 'Version: %1$s', 'fotobook' ), $the_theme->get( 'Version' ) ); ?>)
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper footer end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</div><!-- tambahan untuk mmenu jquery -->

<style type="text/css">
   .mm-menu{background-color: #f3f0e7}   
</style>

<script>
jQuery(document).ready(function($) {
      var $menu = $("#fotobook-menu").mmenu({
   //   options
   navbar:{title:"<?php bloginfo( 'name' ); ?>"},
   "extensions": [
            "pagedim-black"
         ]
},{
   // configuration
         offCanvas: {
            pageSelector: "#fotobook-page"
         },
         classNames: {
            fixedElements: {
               fixed: "mm-fixed",
               sticky: "mm-sticky"               
            }
         }
});
var $icon = $(".hamburger-toggler");
var API = $menu.data( "mmenu" );

$icon.on( "click", function() {
   API.open();
});

API.bind( "open:finish", function() {
   setTimeout(function() {
      $icon.addClass( "is-active" );
   }, 100);
});
API.bind( "close:finish", function() {
   setTimeout(function() {
      $icon.removeClass( "is-active" );
   }, 100);
});
   });
</script>
</body>

</html>

