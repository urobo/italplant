</div>

<?php
// The pre-footer component for the home page
$home_check = get_field('home_line_break');
if (!$home_check && !is_singular('products')):
    $pre_footer = get_field('active_component');
    if ( $pre_footer ):
        get_template_part( 'template-parts/global','pre-footer' );
    endif;
endif;


// Get the Nav BG to be set from admin panel, for each ldap_control_paged_resul
$bg = 'NULL';
if ( is_archive() || is_home()) :

	if ( is_post_type_archive('areas') ):
		$settings = get_field('areas_settings','option');
        $bg = $settings['nav_background'];

	elseif ( is_post_type_archive('products')):
		$settings = get_field('products_settings','option');
        $bg = $settings['nav_background'];

	elseif ( is_post_type_archive('projects') ):
		$settings = get_field('projects_settings','option');
        $bg = $settings['nav_background'];

	elseif ( is_home() ):
		// Check the Blog archive is_home = is posts page
		$settings = get_field('news_settings','option');
        $bg = $settings['nav_background'];

    else:
        $bg = get_field('nav_background');

	endif;

elseif ( is_front_page() ):
	$bg = get_field('home_line_break_nav_background');

else:

    $bg = get_field('nav_background');

endif;

?>

<div class="bg-footer">
    <div class="l-container footer-wrap">
        <div class="l-col-12 footer-top">
            <!-- logo -->
            <a class="footer-logo" href="<?php echo home_url(); ?>" rel="nofollow">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.svg" alt="Logo"/>
            </a>

            <div class="social-media-links">
                <?php $socials = get_field('social_media', 'option'); ?>
                <a href="<?php echo $socials['facebook'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icn-facebook.svg" alt=""></a>
                <a href="<?php echo $socials['e_mail'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icn-email.svg" alt=""></a>
                <a href="<?php echo $socials['linkedin'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icn-linkedin.svg" alt=""></a>
            </div>
        </div>

        <footer class="l-col-12 footer">
            <?php $contacts = get_field('contatti', 'option'); ?>

            <div class="l-col-6 contatti footer-links">
                <span><?php echo $contacts['indirizzo_nr']; ?> <?php echo $contacts['cap_citta']; ?></span>


                <span>
                    <a href="mailto:<?php echo $contacts['email']; ?>"><?php echo $contacts['email']; ?></a>&nbsp;
                    <a href="tel:<?php echo $contacts['telefono']; ?>"><?php echo $contacts['telefono']; ?></a>
                </span>


            </div>

        </footer>

        <div class="l-col-12 footer">

            <div class="l-col-6 contatti footer-links">
                <span>
                    <?php wp_nav_menu(array(
                            'container' => false,
                            'theme_location' => 'footer-links-2'
                        )); ?>
                </span>
            </div>


            <div class="l-col-6 contatti footer-copy">
                &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - <?php echo the_field('copy_text','option') ?>
            </div>

        </div>

    </div>
</div>


</div>
<?php wp_footer(); ?>
<?php // External sources ?>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>

<?php if(is_page_template('template-home.php')): ?>
    <script src="<?php echo get_template_directory_uri() . '/assets/javascript/vendor/fluid-overlay/easings.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/javascript/vendor/fluid-overlay/fluid-overlay.js' ?>"></script>
<?php endif; ?>

<?php //Navigation Background controller ?>
<script type="text/javascript">// Scroll Nav classes toggle


        <?php if ($bg == 'transparent'): ?>

			document.getElementById("site-header").classList.add('transparent-navbar');
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

                    document.getElementById("site-header").classList.add('dark');
                } else {

                    document.getElementById("site-header").classList.remove('dark');
                }

            }

        <?php else: ?>

			document.getElementById("site-header").classList.add('white-navbar');
            document.getElementById("site-header").classList.add('dark');

        <?php endif; ?>

</script>


</body>
</html>
