<?php

/**
 * Template Name: The Process
 * @package WordPress
 */

get_header();
?>

<!-- Banner Section -->

<?php get_template_part('template-parts/main', 'banner'); ?>

<!-- End Banner Section -->

<!-- Privacy Policy Section -->
<section class="privacy-policy-section cms-sec">
	<div class="container">
		<?php echo esc_html(the_content()); ?>
	</div>
</section>

<?php get_footer(); ?>