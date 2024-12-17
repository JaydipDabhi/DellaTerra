<?php
/**
 * The template for displaying all review posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dellaterrapro
 */

get_header();
?>

<section class="blogs-details-section review-detail-page">
	<div class="container">
		<ul class="breadcrumb">
			<?php breadcrumbs(); ?>
		</ul>
		<div class="blogs-details">
			<?php $property_image = get_field( 'property_image' );

			?>
			<?php if( !empty( $property_image ) ) { ?>
				<div class="blog-img float-left">
					<picture><img src="<?php echo esc_url($property_image['url']); ?>" alt="<?php echo esc_attr($property_image['alt']); ?>" height="60" width="60"/></picture>
				</div>
			<?php } ?>
			<div class="blogs-content review-content">
				<div class="time-categories">
					<div class="time-rate">
						<?php 
						$pro_id        = get_the_ID();
						$rating_title  = get_field( 'rating_title', $pro_id );
						$rating_points = get_field( 'rating_points', $pro_id ); 
						?>
						<?php
						if ( ! empty( $rating_points ) ) {
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
						<?php } ?>
						<div class="times">
							<picture><img
								src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/time-icon.svg"
								height="16" width="15"></picture> <?php echo get_the_date( 'M d, Y', get_the_ID() ); ?>

							</div>
						</div>
						<?php $reviewimg = get_the_post_thumbnail_url( get_the_ID() );
						if ( $reviewimg ) :
							?>
							<picture class="pro-img"><img
								src="<?php echo $reviewimg ; ?>"
								alt="profile-img" height="60" width="60" /></picture>
							</div>
						<?php endif; ?>
					</div>
					<?php the_title( '<h2 class="sub-heading">', '</h2>' ); ?>
					<div class="cms-sec">
						<?php the_content(); ?>
					</div>

				</div>
			</div>
			
		</section>

		<?php
		get_footer();