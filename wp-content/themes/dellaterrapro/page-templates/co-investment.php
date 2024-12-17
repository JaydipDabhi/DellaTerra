<?php

/**
 * Template Name: Co-Investment
 *
 * @package WordPress
 */
get_header();
get_template_part('template-parts/main', 'banner');
$investment_title  = get_field('investment_title');
$investment_description = get_field('investment_description');
$investment_cta_button  = get_field('investment_cta_button');
$investment_image       = get_field('investment_image'); ?>
<section class="della-terra-about-sec journey-section">
	<div class="container">
		<div class="della-terra-sides">
			<div class="della-left-side">
				<?php if ($investment_title) { ?>
					<h2 class="sub-heading"><?php echo esc_html($investment_title); ?></h2>
				<?php } ?>
				<div class="della-content cms-sec">
					<?php if ($investment_description) {
						echo wp_kses_post($investment_description);
					} ?>
				</div>
				<?php if ($investment_cta_button) {
					$link_url    = $investment_cta_button['url'];
					$link_title  = $investment_cta_button['title'];
					$link_target = $investment_cta_button['target'] ? $investment_cta_button['target'] : '_self'; ?>
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="della-btn" title="Learn More">
						<span class="btn-text"><?php echo esc_html($link_title); ?></span>
						<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
					</a>
				<?php } ?>
			</div>
			<?php if (! empty($investment_image)) { ?>
				<div class="della-right-side">
					<picture class="journey-img"><img src="<?php echo esc_url($investment_image['url']); ?>" alt="<?php echo esc_attr($investment_image['alt']); ?>" height="544" width="610" /></picture>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php
$service_title = get_field('service_title');
$service_we_provide = get_field('service_we_provide');
?>
<section class="service-provide-section">
	<picture class="gray-star">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/yellow-star.svg" alt="gray-star" height="140" width="140" />
	</picture>
	<?php if ($service_title) { ?>
		<div class="container">
			<h2 class="sub-heading"><?php echo esc_html($service_title); ?></h2>
		</div>
	<?php }
	if ($service_we_provide) { ?>
		<div class="container">
			<div class="services-box-list">
				<?php foreach ($service_we_provide as $services) {
					$service_provide_image  = $services['service_provide_image'] ?? "";
					$service_provide_title = $services['service_provide_title'] ?? "";
					$image_url = $service_provide_image['url'] ?? get_template_directory_uri() . '/assets/images/image-slider.png';
					$image_alt = $service_provide_image['alt'] ?? 'Service Image'; ?>
					<div class="services-box">
						<?php if ($image_url) { ?>
							<picture class="services-image">
								<img class="card-img-top" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
							</picture>
						<?php }
						if ($service_provide_title) { ?>
							<div class="card-title">
								<h3><?php echo esc_html($service_provide_title); ?></h3>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</section>

<?php
$art_board_title = get_field('art_board_title');
$art_board_cta  = get_field('art_board_cta');
if ($art_board_title && $art_board_cta) {
?>
	<section class="cta-section">
		<div class="container">
			<div class="get-start-wrap">
				<h2 class="get-start-title"><?php echo esc_html($art_board_title); ?></h2>
				<?php if ($art_board_cta) {
					$link_url    = $art_board_cta['url'];
					$link_title  = $art_board_cta['title'];
					$link_target = $art_board_cta['target'] ? $art_board_cta['target'] : '_self'; ?>
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="get-start-btn"><?php echo esc_html($link_title); ?></a>
				<?php } ?>
				<picture class="get-start-logo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.webp" height="130" width="145" alt="Della Terra"></picture>
			</div>
		</div>
	</section>
<?php } ?>

<?php
$benefit_title = get_field('benefit_title');
$benefits = get_field('benefits');
?>
<section class="service-provide-section benefits-section">
	<?php if ($benefit_title) { ?>
		<div class="container">
			<h2 class="sub-heading"><?php echo esc_html($benefit_title); ?></h2>
		</div>
	<?php }
	if ($benefits) { ?>
		<div class="container">
			<div class="services-box-list">
				<?php foreach ($benefits as $benefit) {
					$benefits_image  = $benefit['benefits_image'] ?? "";
					$benefits_title = $benefit['benefits_title'] ?? "";
					$default_image_url = get_template_directory_uri() . '/assets/images/image-slider.png';
					$image_url = $benefits_image['url'] ?? $default_image_url;
					$image_alt = $benefits_image['alt'] ?? 'Service Image'; ?>
					<div class="services-box">
						<picture class="services-image">
							<?php if ($image_url) { ?>
								<img class="card-img-top" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
							<?php } ?>
						</picture>
						<?php if ($benefits_title) { ?>
							<div class="card-title">
								<h3><?php echo esc_html($benefits_title); ?></h3>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</section>

<?php
$review_slider_title = get_field('review_slider_title');
$select_reviews       = get_field('select_reviews');
$client_reviews_cta   = get_field('client_reviews_cta');
?>
<section class="customer-client-reviews-section">
	<picture class="gray-star"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/gray-star.svg" alt="gray-star" height="140" width="140" /></picture>
	<?php if ($review_slider_title) { ?>
		<div class="container">
			<h2 class="sub-heading"><?php echo esc_html($review_slider_title); ?></h2>
		</div>
	<?php }
	if ($select_reviews) { ?>
		<div class="reviews-slider">
			<div class="swiper reviewsSwiper">
				<div class="swiper-wrapper">
					<?php foreach ($select_reviews as $select_review) {
						$permalink     = get_permalink($select_review->ID);
						$titles        = get_the_title($select_review->ID);
						$content       = wp_trim_words($select_review->post_content, 18);
						$date          = get_the_date('M d, Y', $select_review->ID);
						$rating_title  = get_field('rating_title', $select_review->ID) ?? 'Overall rating';
						$rating_points = get_field('rating_points', $select_review->ID); ?>
						<div class="swiper-slide">
							<?php if ($titles) { ?>
								<h3 class="review-title"><?php echo esc_html($titles); ?></h3>
							<?php }
							if ($content) { ?>
								<p class="review-text"><?php echo ($content); ?><a href="<?php echo esc_url($permalink); ?>" title="Read more" class="custom-link">Read more...</a></p>
							<?php }
							if ($date) { ?>
								<p class="date"><strong><?php echo esc_html($date); ?></strong></p>
							<?php } ?>
							<div class="overall-rating">
								<?php if ($rating_title) { ?>
									<h4><?php echo esc_html($rating_title); ?></h4>
								<?php }
								if ($rating_points == 1) {
									$points = '1.0';
								} elseif ($rating_points == 2) {
									$points = '2.0';
								} elseif ($rating_points == 3) {
									$points = '3.0';
								} elseif ($rating_points == 4) {
									$points = '4.0';
								} elseif ($rating_points == 5) {
									$points = '5.0';
								} ?>
								<div class="rateing">
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/star-yellow.svg" alt="star-yellow" height="20" width="20" />
									<span><?php echo esc_html($points); ?></span>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		if ($client_reviews_cta) {
			$link_url    = $client_reviews_cta['url'];
			$link_title  = $client_reviews_cta['title'];
			$link_target = $client_reviews_cta['target'] ? $client_reviews_cta['target'] : '_self'; ?>
			<div class="terra-btn client-review-btn">
				<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="della-btn" title="Explore More">
					<span class="btn-text"><?php echo esc_html($link_title); ?></span>
					<picture class="icon-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture>
				</a>
			</div>
	<?php }
	} ?>
</section>

<?php
$faq_title = get_field('faq_title');
$faqs = get_field('faqs');
?>
<section class="faqs-section">
	<div class="container">
		<?php if ($faq_title) { ?>
			<h2 class="sub-heading"><?php echo esc_html($faq_title); ?></h2>
		<?php } ?>
		<div class="accordion-wrap">
			<div class="accordion">
				<?php foreach ($faqs as $faq) {
					$question  = $faq['question'] ?? "";
					$answer = $faq['answer'] ?? ""; ?>
					<div class="accordion-item">
						<button id="accordion-button-1" aria-expanded="false" class="accordion-btn">
							<span class="accordion-title"><?php echo esc_html($question); ?></span>
							<span class="icon" aria-hidden="true"></span>
						</button>
						<div class="accordion-content">
							<p><?php echo esc_html($answer); ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="contact-section">
	<div class="container">
		<div class="contact-wrap-box">
			<div class="contact-box">
				<?php $contact_title = get_field('contact_title');
				if ($contact_title) { ?>
					<h2 class="sub-heading"><?php echo esc_html($contact_title); ?></h2>
				<?php }
				if (have_rows('contact_lists')) { ?>
					<ul class="imfor-list">
						<?php while (have_rows('contact_lists')) {
							the_row();
							$contact_icon = get_sub_field('contact_icon');
							$contact_link = get_sub_field('contact_link'); ?>
							<li>
								<?php if (! empty($contact_icon)) { ?>
									<picture><img src="<?php echo esc_url($contact_icon['url']); ?>" height="26" width="18" alt="<?php echo esc_attr($contact_icon['alt']); ?>"></picture>
								<?php }
								if ($contact_link) {
									$link_url    = $contact_link['url'];
									$link_title  = $contact_link['title'];
									$link_target = $contact_link['target'] ? $contact_link['target'] : '_self'; ?>
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
				<picture class="contact-shape"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/contact-shape.svg" height="200" width="277" alt="message"></picture>
			</div>
			<?php
			$contact_form_title = get_field('contact_form_title');
			$contact_form_desc  = get_field('contact_form_desc');
			$contact_form_shortcode = get_field('contact_form_shortcode');
			?>
			<div class="contact-form">
				<?php if ($contact_form_title) { ?>
					<h2 class="sub-heading"><?php echo esc_html($contact_form_title); ?></h2>
				<?php }
				if ($contact_form_desc) {
					echo wp_kses_post($contact_form_desc);
				}
				echo do_shortcode($contact_form_shortcode); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>