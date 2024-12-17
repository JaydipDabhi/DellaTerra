<?php

/**
 * Template Name: Thank you
 *
 * @package WordPress
 */


get_header();
?>

<section class="four-zero-four-page thankyou-sec">
    <div class="container">
        <h1 class="sub-heading">Thank You!</h1>
        <div class="cms-sec">
            <p>Thank you for reaching out to us. Your form has been successfully submitted.</p>
            <p>We appreciate your interest and will get back to you as soon as possible.</p>
            <p>Have a great day!</p>
        </div>
        <a href="<?php echo home_url(); ?>" class="della-btn" title="Return to Home">
					<span class="btn-text">Return to Home</span>         
					<picture class="icon-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/round-arrow-black.svg" alt="round-arrow" /></picture> 
			</a>
    </div>
</section>

<?php
get_footer();
?>