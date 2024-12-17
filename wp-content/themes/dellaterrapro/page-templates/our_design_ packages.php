<?php

/**
 * Template Name: Our Design Packages
 *
 * @package WordPress
 */

get_header();
?>

<!-- Banner Section -->

<?php get_template_part('template-parts/main', 'banner'); ?>

<!-- End Banner Section -->

<!-- Our Design Packages Section -->
<section class="design-packages-list cms-sec">
	<div class="container">
		<h2 class="sub-heading"><?php the_field('table_title'); ?></h2>
		<div class="design-packages-box">
			<?php
			if (have_rows('table_plan')):
				while (have_rows('table_plan')) : the_row(); ?>

					<div class="design-packages">
						<h3><?php echo get_sub_field('plan_title'); ?></h3>
						<ul>
							<?php
							if (have_rows('plan')):
								while (have_rows('plan')) : the_row(); ?>
									<li><?php echo get_sub_field('plan'); ?></li>
							<?php
								endwhile;
							endif; ?>
						</ul>
					</div>
			<?php
				endwhile;
			endif; ?>
		</div>
	</div>
</section>
<div class="more-details-btn container">
	<strong>For more details:</strong>
	<?php
	$contact_us_link = get_field('contact_us_link');
	$contact_us_link_url = $contact_us_link['url'];
	$contact_us_link_title = $contact_us_link['title'];
	?>
	<a href="<?php echo $contact_us_link_url; ?>" target="_self" class="della-btn" title="Contact Us">
		<span class="btn-text"><?php echo $contact_us_link_title; ?></span>
		<picture class="icon-img"><img src="http://203.109.113.155/DellaTera/wp-content/themes/dellaterrapro/assets/images/round-arrow-black.svg" alt="round-arrow"></picture>
	</a>

</div>
<!-- <section class="privacy-policy-section cms-sec">
	<div class="container">
		<?php echo esc_html(the_content()); ?>
	</div>
</section> -->

<?php get_footer(); ?>