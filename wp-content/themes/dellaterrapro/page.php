<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dellaterrapro
 */

get_header();
get_template_part( 'template-parts/main', 'banner' );
?>

<section class="blogs-details-section">
	<div class="container">

		<div class="blogs-details">
			
			<?php the_title( '<h2 class="sub-heading">', '</h2>' ); ?>	
			<div class="blogs-content cms-sec">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
				
			</div>
		</div>
	</div>

</section>

<?php

get_footer();
