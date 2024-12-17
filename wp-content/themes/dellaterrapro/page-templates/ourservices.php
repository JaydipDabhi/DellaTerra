<?php
/**
 * Template Name: Our Services Page
 *
 * @package WordPress
 */

get_header();

?>
<!-- Banner Section -->

<?php get_template_part( 'template-parts/main', 'banner' ); ?>

<!-- End Banner Section -->

<!--Our Service Title section -->
<?php
$our_service_title       = get_field( 'our_service_title' );
$our_service_description = get_field( 'our_service_description' );
?>
<section class="service-title-section">
	<div class="container">
		<picture class="gray-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/gray-star.svg" alt="gray-star" height="70" width="70"></picture>
		<div class="service-title-wrap">
			<?php if ( $our_service_title ) : ?>
				<h2 class="sub-heading"><?php echo esc_html( $our_service_title ); ?></h2>
			<?php endif; ?>
			<div class="cms-sec">
				<?php
				if ( $our_service_description ) :
					echo wp_kses_post( $our_service_description );
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<!-- Advising Services section -->
<?php
$advising_title       = get_field( 'advising_title' );
$advising_description = get_field( 'advising_description' );
$advising_image       = get_field( 'advising_image' );
?>
<section class="advising-services-section">
	<div class="container">
		<div class="advising-services">
			<div class="advising-content">
				<?php if ( $advising_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $advising_title ); ?></h2>
				<?php endif; ?>
				<div class="cms-sec">
					<?php
					if ( $advising_description ) :
						echo wp_kses_post( $advising_description );
					endif;
					?>
				</div>
			</div>
			<?php if ( ! empty( $advising_image ) ) : ?>
				<div class="advising-img">
					<picture><img src="<?php echo esc_url( $advising_image['url'] ); ?>" alt="<?php echo esc_attr( $advising_image['alt'] ); ?>" height="400" width="610"></picture>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<picture class="yellow-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/yellow-star.svg" alt="yellow-star"  height="116" width="116"/></picture>
</section>

<!-- Co-investments section -->
<?php
$coinvestments_image = get_field( 'coinvestments_image' );
$coinvestments_title = get_field( 'coinvestments_title' );
$coinvestments_desc  = get_field( 'coinvestments_desc' );
?>
<section class="team-section co-investments">
	<div class="container">
		<div class="team-wrap">
			<?php if ( ! empty( $coinvestments_image ) ) : ?>
				<div class="team-img">
					<picture><img src="<?php echo esc_url( $coinvestments_image['url'] ); ?>" alt="<?php echo esc_attr( $coinvestments_image['alt'] ); ?>" height="470" width="610"></picture>
				</div>
			<?php endif; ?>
			<div class="team-content">
				<?php if ( $coinvestments_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $coinvestments_title ); ?></h2>
				<?php endif; ?>
				<div class="cms-sec">
					<?php
					if ( $coinvestments_desc ) :
						echo wp_kses_post( $coinvestments_desc );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>