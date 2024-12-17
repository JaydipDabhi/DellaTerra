<?php
/**
 * Template Name:  Review Page
 *
 * @package WordPress
 */

get_header();

?>
<!-- Banner Section -->

<?php get_template_part( 'template-parts/main', 'banner' ); ?>

<!-- End Banner Section -->
<?php
$review_title        = get_field( 'review_title' );
$review_slider_title = get_field( 'review_slider_title' );
$slider_shortcode    = get_field( 'slider_shortcode' );
?>
<section class="reviews-list-section">
	<div class="container">
		<div class="reviews-btn airbnb-title">
			<?php
			if ( $review_slider_title ) : ?>
				<h2 class="sub-heading"><?php echo esc_html( $review_slider_title ); ?></h2>
			<?php endif; ?>
			
			<div class="terra-btn">
				<a href="#myModal" class="della-btn" title="Submit Review" data-bs-toggle="modal" data-bs-target="#myModal">
					<span class="btn-text">Submit Review</span>         
					<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" height="50" width="50"/></picture> 
				</a>
			</div>
		</div>
		
		<?php
		$review_all_query = new WP_Query( array(
			'post_type'   => 'reviews',
			'post_status' => 'publish',
			'posts_per_page' => 4,
		));
		if ( $review_all_query->have_posts() ) :
			?>
			<div class="reviews-list-boxs">	
				<?php
				while ( $review_all_query->have_posts() ) :
					$review_all_query->the_post();
					$post_title    = get_the_title( $post_id->ID );
					$permalink     = get_permalink( $post_id->ID );
					$post_image    = get_the_post_thumbnail_url( $post_id->ID );
					$content       = get_the_content( $post_id->ID );
					$content       = wp_trim_words( $content, 18, '...' );
					$date          = get_the_date( 'M d, Y', $post_id->ID );
					$rating_title  = get_field( 'rating_title', $post_id->ID );
					$rating_points = get_field( 'rating_points', $post_id->ID ); ?>
					<div class="review-box">
						<div class="pro-name-img">
							<?php if ( $post_title ): ?>
								<h3 class="review-title"><?php echo esc_html( $post_title ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $post_image ) ) : ?>
								<picture class="pro-img">
									<img src="<?php echo esc_url( $post_image ); ?>" alt="profile-img" height="60" width="60"/>
								</picture>
							<?php else : ?>
								<picture class="pro-img">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/images.png" alt="profile-img" height="60" width="60"/>
								</picture>
							<?php endif; ?>
						</div>
						<?php
						if ( $content ) :
							?>
							<p class="review-text"><?php echo( $content ); ?><a href="<?php echo esc_url( $permalink ); ?>" title="Read more" class="custom-link">Read more...</a></p>
							<?php
						endif;
						if ( $date ) :
							?>
							<p class="date"><strong><?php echo esc_html( $date ); ?></strong></p>
						<?php endif; ?>
						
							<?php if ( !empty($rating_points) ) { ?>
						<div class="overall-rating">
							<h4><?php echo _e( 'Overall rating' ); ?></h4>
							<?php							
							if ( $rating_points == 1 ) {
								$points = '1.0';
							} elseif( $rating_points == 2 ) {
								$points = '2.0';
							} elseif( $rating_points == 3 ) {
								$points = '3.0';
							} elseif( $rating_points == 4 ) {
								$points = '4.0';
							} elseif( $rating_points == 5 ) {
								$points = '5.0';
							}
							?>
							<div class="rateing">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/star-yellow.svg" alt="star-yellow" height="20" width="20"/>
								<span><?php echo esc_html( $points ); ?></span>
							</div>
						</div>
						<?php } ?>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>

			</div>
		<?php endif; ?>
			<?php 
			$count_post = wp_count_posts( $post_type = 'reviews' );
			if ( $count_post->publish > 4 ) : 
				?>
				<div class="terra-btn loadmore ">
					<a href="#" class="della-btn" title="Load More" id="review_lodemore">
						<span class="btn-text">Load More</span>         
						<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
					</a>
				</div>
			<?php endif; ?>
	</div>
	<!-- <div class="page-loader"><span class="loader"></span></div> -->
	<div class="container">
	<div class="reviews-title">
			<?php if ( $review_title ) : ?>
				<h2 class="sub-heading"><?php echo esc_html( $review_title ); ?></h2>
			<?php endif; ?>
		</div>
	<?php if ( $slider_shortcode ) : ?>
			<div class="slider-shortcode">	
				<?php echo do_shortcode( $slider_shortcode ); ?>
			</div>
		<?php endif; ?>
		</div>
</section>

<!-- Modal -->
<div class="modal fade review-modal-sec" id="myModal" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered review-modal">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title sub-heading" id="MyModalLabel">Submit Review</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="d58b7cc" title="Review Form"]' ); ?>
			</div>
		</div>
	</div>
</div>

<?php 
get_footer();
?>