<?php

/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
$query_object = get_queried_object();
$blog_id      = get_option('page_for_posts');
$count        = $query_object->category_count;

?>
<!-- Banner Section -->

<section class="all-banner-section">
	<div class="container">
		<div class="main-text">
			<h1 class="page-title"><?php
									foreach ((get_the_category()) as $category) {
										echo $category->cat_name . ' ';
									}
									?></h1>
		</div>
	</div>
</section>


<section class="blogs-section">
	<div class="container">
		<div class="blogs-name">
			<h3>Categories:</h3>

			<ul class="project-name-list" id="category-filters">
				<li><span data-category="<?php echo esc_url(get_the_permalink($blog_id)); ?>" class="pro-btn"><?php esc_html_e('All', 'text-domain'); ?></span></li>
				<?php

				$categories = get_categories(
					array(
						'hide_empty' => true,
						'exclude'    => array(1),
					)
				); ?>

				<?php
				foreach ($categories as $category) :
				?>
					<li><span data-category="<?php echo esc_url(get_term_link($category)); ?>" class="pro-btn <?php echo $category->term_id === $query_object->term_id ? 'active' : ''; ?>"><?php echo esc_html($category->name); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if (have_posts()) :  ?>
			<div class="blogs-listing">
				<?php while (have_posts()) :
					the_post();
					$post_id   = get_the_id();
					$title     = get_the_title($post_id);
					$content   = get_the_content($post_id);
					$content   = wp_trim_words($content, 18, '...');
					$permalink = get_the_permalink($post_id);
					$image     = get_the_post_thumbnail_url($post_id);
					$post_date = get_the_date('M d, Y', $post_id);
				?>
					<div class="blogs-box">
						<?php if ($image) :
							$image_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
						 ?>
							<a href="<?php echo esc_url($permalink); ?>" class="blogs-img">
								<picture><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></picture>
							</a>
						<?php endif; ?>
						<div class="blogs-content">
							<?php if ($title) : ?>
								<a href="<?php echo esc_url($permalink); ?>" class="blog-title">
									<h4><?php echo esc_html($title); ?></h4>
								</a>
							<?php endif; ?>
							<?php if ($post_date) : ?>
								<span>
									<picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/time-icon.svg" height="16" width="15"></picture> <?php echo esc_html($post_date); ?>
								</span>
							<?php endif; ?>
							<?php if ($content) : ?>
								<p><?php echo wp_kses_post($content); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url($permalink); ?>" class="read-more"><?php echo _e('Read more'); ?><picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/right-arrow.svg" height="10" width="6" alt="right arrow"></picture></a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php //wp_reset_postdata(); 
			?>
			<?php if ($count > 3) : ?>
				<div class="terra-btn">
					<a href="#" class="della-btn" title="Load More" id="load-more" category="<?php echo $query_object->term_id; ?>">
						<span class="btn-text">Load More</span>
						<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>

</section>

<?php

get_footer();
