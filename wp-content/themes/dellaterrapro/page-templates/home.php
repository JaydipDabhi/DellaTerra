<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 */

get_header();

?>
<!-- Banner Section -->
<?php
$banner_title            = get_field( 'banner_title' );
$banner_link             = get_field( 'banner_link' );
$banner_background_image = get_field( 'banner_background_image' );
?>
<section class="main-section" style="background-image: url(<?php echo esc_url( $banner_background_image['url'] ); ?>);">
	<div class="container">
		<div class="main-text">
			<?php
			if ( $banner_title ) :
				?>
				<h1 class="main-heading"><?php echo ( $banner_title ); ?></h1>
				<?php
			endif;
			if ( $banner_link ) :
				$link_url    = $banner_link['url'];
				$link_title  = $banner_link['title'];
				$link_target = $banner_link['target'] ? $banner_link['target'] : '_self';
				?>

				<a href="<?php echo esc_url( $link_url ); ?>" class="della-btn" title="Work With Us" target="<?php echo esc_attr( $link_target ); ?>">
					<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
					<picture class="icon-img">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow.svg" alt="round-arrow" height="50" width="50"/>
					</picture> 
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- End Banner Section -->

<!-- Della Terra about Section -->
<?php
$about_title       = get_field( 'about_title' );
$about_description = get_field( 'about_description' );
$about_ctp_button  = get_field( 'about_ctp_button' );
?>
<section class="della-terra-about-sec">
	<div class="container">
		<div class="della-terra-sides">
			<div class="della-left-side">
				<?php if ( $about_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $about_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $about_description ) : ?>
					<div class="della-content cms-sec">
						<?php echo wp_kses_post( $about_description ); ?>
					</div>
					<?php
				endif;
				if ( $about_ctp_button ) :
					$link_url    = $about_ctp_button['url'];
					$link_title  = $about_ctp_button['title'];
					$link_target = $about_ctp_button['target'] ? $about_ctp_button['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="della-btn" title="I Want to Know More">
						<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
						<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
					</a>
				<?php endif; ?>
			</div>
			<?php
			if ( have_rows( 'about_images' ) ) :
				?>
				<div class="della-right-side">
					<?php
					$count = 1;
					while ( have_rows( 'about_images' ) ) :
						the_row();
						$image       = get_sub_field( 'image' );
						$image_title = get_sub_field( 'image_title' );
						$image_link  = get_sub_field( 'image_link' );
						if ( ! empty( $image ) ) :
							if ( 1 === $count ) {
								$class = 'dell-main-img';
							} else {
								$class = 'dell-sub-img';
							}
							?>
							<a href="<?php echo esc_url( $image_link ); ?>" class="<?php echo esc_html( $class ); ?>">
								<picture>
									<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" height="280" width="610"/>
								</picture>
								<div class="name-link-img">
									<?php if ( $image_title ) : ?>
										<span class="name-link"><?php echo esc_html( $image_title ); ?></span>
									<?php endif; ?>
									<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow.svg" alt="round-arrow" height="40" width="40"/></picture>								
								</div>
							</a>
							<?php
						endif;
						++$count;
						?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Entrepreneur section -->
<?php
$entrepreneur_image        = get_field( 'entrepreneur_image' );
$entrepreneur_title        = get_field( 'entrepreneur_title' );
$entrepreneur_founder_name = get_field( 'entrepreneur_founder_name' );
$entrepreneur_desc         = get_field( 'entrepreneur_desc' );
$entrepreneur_cta          = get_field( 'entrepreneur_cta' );
?>
<section class="entrepreneur-section">
	<picture class="yellow-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/yellow-star.svg" alt="yellow-star"  height="140" width="140"/></picture>
	<div class="container">
		<div class="entrepreneur-sides">
			<?php if ( ! empty( $entrepreneur_image ) ) : ?>
				<div class="entrepreneur-img">
					<picture><img src="<?php echo esc_url( $entrepreneur_image['url'] ); ?>" alt="<?php echo esc_attr( $entrepreneur_image['alt'] ); ?>"  height="500" width="545"/></picture>
				</div>
			<?php endif; ?>
			<div class="entrepreneur-content">
				<?php if ( $entrepreneur_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $entrepreneur_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $entrepreneur_founder_name ) : ?>
					<h3 class="foud-name"><?php echo esc_html( $entrepreneur_founder_name ); ?></h3>
				<?php endif; ?>
				<div class="cms-sec">
					<?php
					if ( $entrepreneur_desc ) {
						echo wp_kses_post( $entrepreneur_desc );
					}
					?>
				</div>
				<?php
				if ( $entrepreneur_cta ) :
					$link_url    = $entrepreneur_cta['url'];
					$link_title  = $entrepreneur_cta['title'];
					$link_target = $entrepreneur_cta['target'] ? $entrepreneur_cta['target'] : '_self';
					?>
					<div class="terra-btn">
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="della-btn" title="<?php echo esc_html( $link_title ); ?>">
							<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
							<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- -- Join us journey section -- -->
<?php
$join_main_title  = get_field( 'join_main_title' );
$join_sub_title   = get_field( 'join_sub_title' );
$join_description = get_field( 'join_description' );
$join_cta_button  = get_field( 'join_cta_button' );
$join_image       = get_field( 'join_image' );
?>
<section class="della-terra-about-sec journey-section">
	<div class="container">
		<div class="della-terra-sides">
			<div class="della-left-side">
				<?php if ( $join_main_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $join_main_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $join_sub_title ) : ?>
					<h3 class="foud-name"><?php echo wp_kses_post( $join_sub_title ); ?></h3>
				<?php endif; ?>
				<div class="della-content cms-sec">
					<?php
					if ( $join_description ) {
						echo wp_kses_post( $join_description );
					}
					?>
				</div>
				<?php
				if ( $join_cta_button ) :
					$link_url    = $join_cta_button['url'];
					$link_title  = $join_cta_button['title'];
					$link_target = $join_cta_button['target'] ? $join_cta_button['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="della-btn" title="Learn More">
						<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
						<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
					</a>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $join_image ) ) : ?>
				<div class="della-right-side">
					<picture class="journey-img"><img src="<?php echo esc_url( $join_image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" height="544" width="610"/></picture>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Customer and Client Reviews section -->
<?php
$client_reviews_title = get_field( 'client_reviews_title' );
$select_reviews       = get_field( 'select_reviews' );
$client_reviews_cta   = get_field( 'client_reviews_cta' );
?>
<section class="customer-client-reviews-section">
	<picture class="gray-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/gray-star.svg" alt="gray-star"  height="140" width="140"/></picture>
	<?php if ( $client_reviews_title ) : ?>
		<div class="container">
			<h2 class="sub-heading"><?php echo esc_html( $client_reviews_title ); ?></h2>
		</div>
	<?php endif; ?>
	<?php if ( $select_reviews ) : ?>
		<div class="reviews-slider">
			<div class="swiper reviewsSwiper">
				<div class="swiper-wrapper">
					<?php
					foreach ( $select_reviews as $select_review ) :
						$permalink     = get_permalink( $select_review->ID );
						$titles        = get_the_title( $select_review->ID );
						$content       = wp_trim_words( $select_review->post_content , 18 );
						$date          = get_the_date( 'M d, Y', $select_review->ID );
						$rating_title  = get_field( 'rating_title', $select_review->ID );
						$rating_points = get_field( 'rating_points', $select_review->ID );
						?>
						<div class="swiper-slide">
							<?php if ( $titles ) : ?>
								<h3 class="review-title"><?php echo esc_html( $titles ); ?></h3>
								<?php
							endif;
							if ( $content ) :
								?>
								<p class="review-text"><?php echo( $content ); ?><a href="<?php echo esc_url( $permalink ); ?>" title="Read more" class="custom-link">Read more...</a></p>
								<?php
							endif;
							if ( $date ) :
								?>
								<p class="date"><strong><?php echo esc_html( $date ); ?></strong></p>
							<?php endif; ?>
							<div class="overall-rating">
								<?php if ( $rating_title ) : ?>
									<h4><?php echo esc_html( $rating_title ); ?></h4>
									<?php
								endif;
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
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
		if ( $client_reviews_cta ) :
			$link_url    = $client_reviews_cta['url'];
			$link_title  = $client_reviews_cta['title'];
			$link_target = $client_reviews_cta['target'] ? $client_reviews_cta['target'] : '_self';
			?>
			<div class="terra-btn client-review-btn">
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="della-btn" title="Explore More">
					<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
					<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
				</a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</section>
<!-- Modal -->
<div class="modal fade review-modal-sec signup-modal-sec" id="signModal" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered review-modal">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title sub-heading" id="MyModalLabel"><?php echo _e( 'Sign up for real estate investing tips and news on upcoming events' ); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode( '[contact-form-7 id="ea51e94" title="Sign up Form"]' ); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
