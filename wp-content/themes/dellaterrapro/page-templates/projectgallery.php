<?php
/**
 * Template Name: Project Gallery
 *
 * @package WordPress
 */

get_header();

?>
<!-- Banner Section -->

<?php get_template_part( 'template-parts/main', 'banner' ); ?>

<!-- End Banner Section -->

<!-- Some of Our Places -->
<?php 
$project_gallery_title = get_field( 'project_gallery_title' );
// echo do_shortcode('[post_names_dropdown]');
?>
<section class="our-project-section">
	<div class="container">
		<div class="reviews-btn">
		<?php
		if ( $project_gallery_title ) : ?>
			<h2 class="sub-heading"><?php echo esc_html( $project_gallery_title ); ?></h2>
		<?php endif; ?>
		
		<div class="terra-btn">
				<a href="#myModalproject" class="della-btn" title="Submit Review" data-bs-toggle="modal" data-bs-target="#myModalproject">
					<span class="btn-text"><?php _e(' Send Inquiry About A Property' ); ?></span>         
					<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" height="50" width="50"/></picture> 
				</a>
			</div>

		</div>
		<ul class="project-name-list test" id="pcategory-filters">
			<li><a  class="pro-btn all-btn pro-gallery active" data-category=""><?php esc_html_e('All', 'text-domain'); ?></a></li>
			<?php
			$categories = get_terms(
				array(
					'taxonomy'   => 'projectgallery-cat',
					'hide_empty' => false,
				)
			);
			
			foreach ( $categories as $category ) :
				?>
				<li>
					<a data-category="<?php echo esc_attr( $category->term_id ); ?>" class="pro-btn pro-gallery"><?php echo esc_html( $category->name ); ?></a>

				</li>
			<?php endforeach; ?>
		</ul>		
		
		<?php
		$projectgallery_query = new WP_Query(
			array(
				'post_type'      => 'projectgallery',
				'post_status'    => 'publish',
				'posts_per_page' => 6,
			),
		);

		if ( $projectgallery_query->have_posts() ) :
			?>
			<div class="project-list-box">
				<?php
				while ( $projectgallery_query->have_posts() ) :
					$projectgallery_query->the_post();
					$post_id    = get_the_ID();
					$post_title = get_the_title( $post_id );
					$permalink  = get_permalink( $post_id );
					$post_image = get_the_post_thumbnail_url( $post_id );
					$content    = get_the_content( $post_id );
					
					$gallery_images_urls = array();

					if ( have_rows( 'gallery_images', $post_id ) ) :
						while ( have_rows( 'gallery_images', $post_id ) ) : the_row();
							$gallery_image = get_sub_field( 'image' );
							$image_caption = get_sub_field( 'caption' );

							if ( $gallery_image['url'] !== $post_image ) {
								$gallery_images_urls[] = $gallery_image['url'];
							}
						endwhile;
					endif;
					?>
					
					<a href="<?php echo esc_url( $post_image ); ?>" alt="<?php echo esc_attr( $post_title ); ?>" class="project-box" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html( $post_title ); ?>">
						<picture>
							<img src="<?php echo esc_url( $post_image ); ?>" alt="<?php echo esc_attr( $post_title ); ?>" height="330" width="400">
						</picture>
						<span><?php echo esc_html( $post_title ); ?></span>
					</a>
					<?php

					foreach ( $gallery_images_urls as $image_url ) :
						if ( $image_url ) :
							?>
							<a href="<?php echo esc_url( $image_url ); ?>" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html( $post_title ); ?>" data-thumb="<?php echo esc_url( $image_url ); ?>" class="hidden"></a>
							<?php
						endif;
					endforeach;
				endwhile;
				?>
				
			</div>
		<?php endif; ?>
		<?php
		// $args = array(
		// 	'hide_empty' => false,
		// 	'taxonomy'   => 'projectgallery-cat',
		// );
		// $categories = get_categories($args);
		// $result = array_column($categories, 'count');
		
		// $is_less_than_six = array_filter($result, function($count) {
		// return $count <= 5;
		// }) !== [];
	
		// if (!$is_less_than_six) :
			?>
			<div class="terra-btn load-more-btn" >
				<a href="#" class="della-btn" title="Load More" id="gallery_lodemore" category="<?php echo $category->term_id; ?>">
					<span class="btn-text">Load More</span>
					<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
				</a>
			</div>
		<?php //endif; ?>
	</div>
</section>
<!-- Modal -->
<div class="modal fade review-modal-sec" id="myModalproject" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered review-modal">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title sub-heading" id="MyModalLabel"><?php _e( 'Send Inquiry About A Property' );?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="1210130" title="Send Inquiry About A Property"]' ); ?>
			</div>
		</div>
	</div>
</div>
<?php 
get_footer();
?>