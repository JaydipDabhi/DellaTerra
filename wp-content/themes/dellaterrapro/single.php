<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dellaterrapro
 */

get_header();
?>

<!-- Blog Detail page -->

<section class="blogs-details-section">
	<div class="container">


		<div class="blogs-details">
			<?php if (has_post_thumbnail()) { ?>
				<div class="blog-img">
					<picture>
						<img src="<?php echo esc_url(the_post_thumbnail_url()); ?>"
							alt="blog-img" height="460" width="590" />
					</picture>
				</div>
			<?php } ?>
			<div class="blogs-content">
				<div class="time-categories">
					<div class="times">
						<picture><img
								src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/time-icon.svg"
								height="16" width="15"></picture> <?php echo get_the_date('M d, Y'); ?>
					</div>
					<?php
					$categories = get_the_category();
					if (! empty($categories)) {
						foreach ($categories as $category) {
					?>
							<a href="<?php echo get_category_link($category->term_id); ?>">
								<div class="categories"><?php echo esc_html($category->name); ?></div>
							</a>
					<?php
						}
					}
					?>
				</div>
				<?php the_title('<h2 class="sub-heading">', '</h2>'); ?>
				<div class="cms-sec">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Recent Blog  -->
<?php

$current_post_id = get_the_ID();

$recent_args = array(
	"posts_per_page" => 3,
	"orderby"        => "date",
	"order"          => "DESC",
	'post__not_in' => array($current_post_id),
);

$recent_posts = new WP_Query($recent_args);
?>
<section class="blogs-section">
	<div class="container">
		<h2 class="sub-heading">Recent Blog</h2>
		<div class="blogs-listing">
			<?php
			if ($recent_posts->have_posts()) :
				while ($recent_posts->have_posts()) :

					$recent_posts->the_post();
					$image_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
			?>
					<div class="blogs-box">
						<a href="<?php the_permalink(); ?>" class="blogs-img">
							<picture><img
									src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr($image_alt); ?>">
							</picture>
						</a>
						<div class="blogs-content">
							<a href="<?php the_permalink(); ?>" class="blog-title">
								<h4><?php the_title(); ?></h4>
							</a>
							<span>
								<picture><img
										src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/time-icon.svg"
										height="16" width="15"></picture> <?php echo get_the_date('M d, Y'); ?>
							</span>
							<?php //the_content(); 
							?>
							<p><?php echo wp_trim_words(get_the_content(), 14); ?></p>
							<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more'); ?> <picture><img
										src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/right-arrow.svg"
										height="10" width="6" alt="right arrow"></picture></a>
						</div>
					</div>
			<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<?php

get_footer();
