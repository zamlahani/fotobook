<?php
/**
 * Template Name: Fotobook Elementor Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();

?>

<main class="py-5">
<?php
while ( have_posts() ) : the_post();
	the_content();
endwhile;
?>
</main>

<?php
get_footer();
?>