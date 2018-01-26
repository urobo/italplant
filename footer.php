</div>

<?php

// The pre-footer component
$home_check = get_field('home_line_break_active_component');
if (!$home_check):
    $pre_footer = get_field('active_component');
    if ( $pre_footer ):
        get_template_part( 'template-parts/global','pre-footer' );
    endif;
endif;

?>

<div class="bg-footer">
    <div class="l-container footer-wrap">
        <div class="l-col-10 l-col-push-1 footer-top">
            <!-- logo -->
            <a class="l-col-3 footer-logo" href="<?php echo home_url(); ?>" rel="nofollow">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.svg" alt="Logo"/>
            </a>
        </div>

        <footer class="l-col-10 l-col-push-1 footer">
            <?php $contacts = get_field('contatti', 'option'); ?>

            <div class="l-col-5 contatti">
                <span><?php echo $contacts['indirizzo_nr']; ?></span>
                <span><?php echo $contacts['cap_citta']; ?></span>
                <span><?php echo $contacts['email']; ?></span>
                <span><?php echo $contacts['telefono']; ?></span>
            </div>
            <div class="l-col-4 footer-links">
                <?php wp_nav_menu(array(
                    'container' => false,
                    'theme_location' => 'footer-links-1',
                )); ?>
            </div>
            <div class="l-col-3 footer-links">
                <?php wp_nav_menu(array(
                    'container' => false,
                    'theme_location' => 'footer-links-2',
                )); ?>
            </div>
        </footer>
    </div>
    <div class="l-container">
        <div class="footer-copy">
            &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - <?php echo the_field('copy_text','option') ?>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
<?php // External sources ?>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/javascript/vendor/fluid-overlay/easings.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/javascript/vendor/fluid-overlay/fluid-overlay.js' ?>"></script>


</script>
</body>
</html>
