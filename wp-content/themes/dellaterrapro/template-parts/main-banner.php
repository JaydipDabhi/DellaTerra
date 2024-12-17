<?php
/**
 * Banner Section
 *
 * @package WordPress
 */

$banner_title            = get_field( 'banner_title' );
$banner_link             = get_field( 'banner_link' );
$banner_background_image = get_field( 'banner_background_image' );
?>
<section class="all-banner-section" style="background-image: url(<?php echo esc_url( $banner_background_image['url'] ); ?>);">
	<div class="container">
		<div class="main-text">
			<?php
			if ( $banner_title ) :
				?>
				<h1 class="page-title"><?php echo esc_html( $banner_title ); ?></h1>
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

