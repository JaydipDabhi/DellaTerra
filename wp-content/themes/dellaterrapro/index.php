<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dellaterrapro
 */

get_header();
?>
<!-- Banner Section -->

<?php
global $post;
$post = get_post(15);
$blog_id      = get_option('page_for_posts');
setup_postdata($post);
get_template_part('template-parts/main', 'banner', get_post_format());
?>

<section class="blogs-section">
	<div class="container">
		<div class="blogs-name">
			<h3>Categories:</h3>

			<ul class="project-name-list" id="category-filters">
				<!-- <li><span href="" class="pro-btn active" data-category="all"><?php // esc_html_e('All', 'text-domain'); 
																					?></span></li> -->
				<li><span data-category="<?php echo esc_url(get_the_permalink($blog_id)); ?>" class="pro-btn"><?php esc_html_e('All', 'text-domain'); ?></span></li>
				<?php
				$categories = get_categories();
				foreach ($categories as $category) :
				?>
					<li>
						<span data-category="<?php echo esc_url(get_term_link($category)); ?>" class="pro-btn"><?php echo esc_html($category->name); ?></span>
					</li>
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
							<?php if ($post_date) :
								$image_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
							 ?>
								<span>
									<picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/time-icon.svg" height="16" width="15" alt="<?php echo esc_attr($image_alt); ?>"></picture> <?php echo esc_html($post_date); ?>
								</span>
							<?php endif; ?>
							<?php if ($content) : ?>
								<p><?php echo wp_kses_post($content); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url($permalink); ?>" class="read-more"><?php echo _e('Read more'); ?><picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/right-arrow.svg" height="10" width="6"></picture></a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
			<div class="terra-btn">
				<a href="#" class="della-btn" title="Load More" id="load-more">
					<span class="btn-text">Load More</span>
					<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
				</a>
			</div>
		<?php endif; ?>

	</div>

</section>
<?php

get_footer();
