<?php

/**
 * Template Name: Co Invest with us
 *
 * @package WordPress
 */

get_header();
?>

<!-- Banner Section -->

<?php get_template_part('template-parts/main', 'banner'); ?>

<!-- End Banner Section -->

<!-- Privacy Policy Section -->
<section class="privacy-policy-section cms-sec">
    <div class="container">
        <?php echo esc_html(the_content()); ?>
    </div>
</section>
<!-- Contact Us Section -->
<?php
$contact_title = get_field('contact_title');
?>
<section class="contact-section">
    <div class="container">
        <div class="contact-wrap-box">
            <div class="contact-box">
                <?php if ($contact_title) : ?>
                    <h2 class="sub-heading"><?php echo esc_html($contact_title); ?></h2>
                <?php endif; ?>
                <?php
                if (have_rows('contact_lists')) :
                ?>
                    <ul class="imfor-list">
                        <?php
                        while (have_rows('contact_lists')) :
                            the_row();
                            $contact_icon = get_sub_field('contact_icon');
                            $contact_link = get_sub_field('contact_link');
                        ?>
                            <li>
                                <?php if (! empty($contact_icon)) : ?>
                                    <picture><img src="<?php echo esc_url($contact_icon['url']); ?>" height="26" width="18" alt="<?php echo esc_attr($contact_icon['alt']); ?>"></picture>
                                <?php
                                endif;
                                if ($contact_link) :
                                    $link_url    = $contact_link['url'];
                                    $link_title  = $contact_link['title'];
                                    $link_target = $contact_link['target'] ? $contact_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <picture class="contact-shape"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/contact-shape.svg" height="200" width="277" alt="message"></picture>
            </div>
            <?php
            $contact_form_title = get_field('contact_form_title');
            $contact_form_desc  = get_field('contact_form_desc');
            ?>
            <div class="contact-form">
                <?php if ($contact_form_title) : ?>
                    <h2 class="sub-heading"><?php echo esc_html($contact_form_title); ?></h2>
                <?php endif; ?>
                <?php
                if ($contact_form_desc) :
                    echo wp_kses_post($contact_form_desc);
                endif;
                ?>
                <?php
                $contact_form_shortcode = get_field('contact_form_shortcode');
                echo do_shortcode($contact_form_shortcode);
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>