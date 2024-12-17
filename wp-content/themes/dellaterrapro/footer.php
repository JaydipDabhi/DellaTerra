<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dellaterrapro
 */

?>

<footer id="colophon" class="site-footer footer-section">
	<div class="container">
		<div class="footer-site">
			<?php
			$footer_logo = get_field('footer_logo', 'option');
			if ($footer_logo) :
			?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="foote-logo">
					<picture><img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>" height="100" width="112" /></picture>
				</a>
			<?php
			endif;
			$footer_heading = get_field('footer_heading', 'option');
			if ($footer_heading) :
			?>
				<h2 class="sub-heading"><?php echo esc_html($footer_heading); ?></h2>
			<?php endif; ?>
			<?php
			$footer_form_shortcode = get_field('footer_form_shortcode', 'option');
			if ($footer_form_shortcode) {
				echo do_shortcode($footer_form_shortcode);
			}
			?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer menu',
					'container'      => 'ul',
					'menu_class'     => 'footer-link',
				)
			);
			?>
			<div class="footer-bottom">
				<ul class="bottom-link">
					<?php $copyright_text = get_field('copyright_text', 'option'); ?>
					<?php if ($copyright_text) : ?>
						<li class="links1"><?php echo do_shortcode($copyright_text); ?></li>
					<?php endif; ?>
					<?php if (have_rows('footer_links', 'option')) : ?>
						<li class="links">
							<?php
							while (have_rows('footer_links', 'option')) :
								the_row();
								$footer_link = get_sub_field('footer_link', 'option');
								if ($footer_link) :
									$link_url    = $footer_link['url'];
									$link_title  = $footer_link['title'];
									$link_target = $footer_link['target'] ? $footer_link['target'] : '_self';
							?>
									<a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_html($link_title); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>
							<?php endwhile; ?>
						</li>
					<?php endif; ?>
				</ul>
				<?php if (have_rows('social_links', 'option')) : ?>
					<div class="share-link">
						<?php
						while (have_rows('social_links', 'option')) :
							the_row();
							$social_link = get_sub_field('social_link', 'option');
							$social_icon = get_sub_field('social_icon', 'option');
							if ($social_link || $social_icon) :
								$link_url    = $social_link['url'];
								$link_target = $social_link['target'] ? $social_link['target'] : '_self';
						?>
								<a href="<?php echo esc_url($link_url); ?>" title="Facebook" target="<?php echo esc_attr($link_target); ?>">
									<picture><img src="<?php echo esc_url($social_icon['url']); ?>" alt="<?php echo esc_attr($social_icon['alt']); ?>" height="40" width="40" /></picture>
								</a>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="modal fade review-modal-sec signup-modal-sec" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered review-modal">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h5 class="modal-title sub-heading"><?php _e('Thank you for submitting your request.'); ?></h5>
				</div>
				<div class="modal-footer">
					<div class="terra-btn">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="della-btn" title="Home">
							<span class="btn-text"><?php _e('Go To Home'); ?></span>
							<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade review-modal-sec signup-modal-sec" id="signupModal" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered review-modal">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h5 class="modal-title sub-heading"><?php _e('Thank You for Sign up.'); ?></h5>
				</div>
				<div class="modal-footer">
					<div class="terra-btn">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="della-btn" title="Home">
							<span class="btn-text"><?php _e('Go To Home'); ?></span>
							<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="page-loader" style="display: none;">
	    <span class="loader"></span>
	</div>

	<div class="page-loader-gallery" style="display: none;">
	    <span class="loader"></span>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>