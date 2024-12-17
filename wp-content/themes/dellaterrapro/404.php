<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dellaterrapro
 */

get_header();

$image = get_field( 'image', 'option' );
$title = get_field( 'title', 'option' );
$desc  = get_field( 'desc', 'option' );
$link  = get_field( 'link', 'option' );
?>
<section class="four-zero-four-page">
	<div class="container">
			<h3 class="foud-name">SOMETHING JUST WENT WRONG !</h3>
			

				<?php if( $title ): ?>
					<div class="title center-text ">
						<h2 class="sub-heading"><?php echo esc_html( $title ); ?> </h2>
					</div>
				<?php endif; ?>
				<div class="della-content">
					<?php if ( $desc ) : ?>
						<?php echo wp_kses_post( $desc ); ?>
					<?php endif; ?>

					<?php if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="della-btn" title="Learn More">
								<span class="btn-text"><?php echo esc_html( $link_title ); ?></span>         
								<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
							</a>
						<?php endif; ?>
				</div>
		</section>

		<!-- <section class="four-zero-four-page">
					<div class="container">
							<h3 class="foud-name">SOMETHING JUST WENT WRONG !</h3>
							<div class="title center-text">
								<h2 class="sub-heading">404 </h2>
							</div>
							<div class="della-content">
								<p>For Some Reason The Page You Requested Could Not Be Found On Our Server.</p>
									<a href="#" class="della-btn" title="Learn More">
									<span class="btn-text">Home</span>         
									<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
								</a>
							</div>
						</div>
					</div>
			</section> -->

		<?php
		get_footer();
