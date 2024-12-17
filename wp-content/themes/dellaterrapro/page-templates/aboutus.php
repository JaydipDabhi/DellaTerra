<?php
/**
 * Template Name: About Us Page
 *
 * @package WordPress
 */

get_header();

?>
<!-- Banner Section -->

<?php get_template_part( 'template-parts/main', 'banner' ); ?>

<!-- End Banner Section -->

<!-- About Us Section -->
<?php
$about_us_title  = get_field( 'about_us_title' );
$about_us_desc   = get_field( 'about_us_desc' );
$about_name_text = get_field( 'about_name_text' );
$about_name_sign = get_field( 'about_name_sign' );
?>
<section class="della-terra-about-sec aboutus-section">
	<picture class="gray-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/gray-star.svg" alt="gray-star"  height="70" width="70"/></picture>
	<div class="container">
		<div class="della-terra-sides">
			<div class="della-left-side">
				<?php if ( $about_us_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $about_us_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $about_us_desc ) : ?>
					<div class="della-content cms-sec">
						<?php echo wp_kses_post( $about_us_desc ); ?>
					</div>
					<?php
				endif;
				?>
				<div class="name-sign">
					<?php if ( $about_name_text ) : ?>
						<p><span><?php echo esc_html( $about_name_text ); ?></span></p>
						<?php
					endif;
					if ( $about_name_sign ) :
						?>
						<p><strong><?php echo esc_html( $about_name_sign ); ?></strong></p>
					<?php endif; ?>
				</div>
			</div>
			<?php
			if ( have_rows( 'about_us_images' ) ) :
				?>
				<div class="della-right-side">
					<?php
					$count = 1;
					while ( have_rows( 'about_us_images' ) ) :
						the_row();
						$image = get_sub_field( 'image' );
						if ( 1 === $count ) {
							$class = 'dell-main-img';
						} else {
							$class = 'dell-sub-img';
						}
						if ( ! empty( $image ) ) :
							?>
							<div class="<?php echo esc_html( $class ); ?>">
								<picture>
									<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" height="250" width="610"/>
								</picture>
							</div>
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

<!-- Vision & Value section -->
<section class="vision-value-section">
	<div class="container vision-wrap">
		<?php
		if ( have_rows( 'vision_and_value_content' ) ) :
			?>
			<div class="vision-value-content">
				<?php
				while ( have_rows( 'vision_and_value_content' ) ) :
					the_row();
					$main_title = get_sub_field( 'main_title' );
					?>
					<div class="vision-cotent">
						<?php if ( $main_title ) : ?>
							<h2 class="sub-heading"><?php echo esc_html( $main_title ); ?></h2>
						<?php endif; ?>
						<div class="cms-sec">
							<?php
							if ( get_sub_field( 'choose_desc_or_list' ) == 'description' ) {
								$description = get_sub_field( 'vision_and_value_desc' );
								echo wp_kses_post( $description );
							}
							?>
						</div>
						<?php if ( get_sub_field( 'choose_desc_or_list' ) == 'list' ) { ?>
							<div class="value-cotent">
								<?php
								if ( have_rows( 'lists' ) ) :
									?>
									<ul class="value-list">
										<?php
										while ( have_rows( 'lists' ) ) :
											the_row();
											$list = get_sub_field( 'list' );
											if ( $list ) :
												?>
												<li><?php echo esc_html( $list ); ?></li>
											<?php endif; ?>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php } ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php
		if ( have_rows( 'vision_and_value_images' ) ) :
			?>
			<div class="vision-img">
				<?php
				$imgcount = 1;
				while ( have_rows( 'vision_and_value_images' ) ) :
					the_row();
					$image = get_sub_field( 'image' );
					if ( ! empty( $image ) ) :
						if ( 1 === $imgcount ) {
							$imgclass = 'vision-one';
						} elseif ( 2 === $imgcount ) {
							$imgclass = 'vision-two';
						}
						?>
						<picture class="<?php echo esc_html( $imgclass ); ?>"><img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" height="295" width="415"></picture>
					<?php endif; ?>
					
					<?php
					++$imgcount;
				endwhile;
				?>
			</div>
		<?php endif; ?>
	</div>
</section>

<!--Team section -->
<?php
$team_image       = get_field( 'team_image' );
$team_title       = get_field( 'team_title' );
$team_description = get_field( 'team_description' );
?>
<section class="team-section">
	<div class="container">
		<div class="team-wrap">
			<?php if ( ! empty( $team_image ) ) : ?>
				<div class="team-img">
					<picture><img src="<?php echo esc_url( $team_image['url'] ); ?>" alt="<?php echo esc_attr( $team_image['alt'] ); ?>" height="470" width="610"></picture>
				</div>
			<?php endif; ?>
			<div class="team-content">
				<?php if ( $team_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $team_title ); ?></h2>
				<?php endif; ?>
				<div class="cms-sec">
					<?php
					if ( $team_description ) :
						echo wp_kses_post( $team_description );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Founder, CEO -->
<?php
$founder_title       = get_field( 'founder_title' );
$founder_sub_title   = get_field( 'founder_sub_title' );
$founder_description = get_field( 'founder_description' );
$founder_image       = get_field( 'founder_image' );
?>
<section class="founder-ceo-section">
	<picture class="gray-star"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/gray-star.svg" alt="gray-star" height="113" width="113"></picture>
	<div class="container">
		<?php if ( $founder_title ) : ?>
			<h2 class="sub-heading"><?php echo esc_html( $founder_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $founder_sub_title ) : ?>
			<h3 class="foud-name"><?php echo esc_html( $founder_sub_title ); ?></h3>
		<?php endif; ?>
		
		<div class="founder-detail">
			<?php if ( ! empty( $founder_image ) ) : ?>
				<picture class="right-side"><img src="<?php echo esc_url( $founder_image['url'] ); ?>" alt="<?php echo esc_attr( $founder_image['alt'] ); ?>"  height="500" width="545"/></picture></picture>
			<?php endif; ?>
			<div class="cms-sec">
				<?php
				if ( $founder_description ) :
					echo wp_kses_post( $founder_description );
				endif;
				?>
			</div>
		</div>

	</div>
</div>
</section>

<!-- Co-Founder, Chief People Officer -->
<?php
$cofounder_image     = get_field( 'cofounder_image' );
$cofounder_title     = get_field( 'cofounder_title' );
$cofounder_sub_title = get_field( 'cofounder_sub_title' );
$cofounder_desc      = get_field( 'cofounder_desc' );
?>
<section class="co-founder-section">
	<div class="container">
		<div class="co-founder-wrap">
			<?php if ( ! empty( $cofounder_image ) ) : ?>
				<div class="founder-img">
					<picture><img src="<?php echo esc_url( $cofounder_image['url'] ); ?>" alt="<?php echo esc_attr( $cofounder_image['alt'] ); ?>" height="500" width="545"></picture>
				</div>
			<?php endif; ?>
			<div class="founder-content">
				<?php if ( $cofounder_title ) : ?>
					<h2 class="sub-heading"><?php echo esc_html( $cofounder_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $cofounder_sub_title ) : ?>
					<h3 class="foud-name"><?php echo esc_html( $cofounder_sub_title ); ?></h3>
				<?php endif; ?>
				<div class="cms-sec">
					<?php
					if ( $cofounder_desc ) :
						echo wp_kses_post( $cofounder_desc );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
