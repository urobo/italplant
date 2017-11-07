</div>
<div class="bg-footer">
    <div class="l-container footer-top">
        <!-- logo -->
        <a class="l-col-3 footer-logo" href="<?php echo home_url(); ?>" rel="nofollow">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.svg" alt="Logo"/>
        </a>
    </div>

    <footer class="l-container footer">
        <?php $contacts = get_field('contatti', 'option'); ?>

        <div class="l-col-3 contatti" style="padding-left:60px;">
            <span><?php echo $contacts['indirizzo_nr']; ?></span><br>
            <span><?php echo $contacts['cap_citta']; ?></span><br>
        </div>
        <div class="l-col-3 contatti">
            <span><?php echo $contacts['email']; ?></span><br>
            <span><?php echo $contacts['telefono']; ?></span><br>
        </div>
    </footer>
    <div class="l-container">
        <div class="footer-copy">
            &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - <?php echo the_field('copy_text','option') ?>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
