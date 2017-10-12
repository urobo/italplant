            </div>
            <div class="bg-footer">

                <div class="l-container">
                    <div class="footer-top">

                    </div>
                    <footer class="footer l-col-12">

                        <div class="l-col-3 l-col-push-1 contatti">
                            <?php $contacts = get_field('contatti', 'option'); ?>
                            <span><?php echo $contacts['intestazione']; ?></span><br>
                            <span><?php echo $contacts['indirizzo_nr']; ?></span><br>
                            <span><?php echo $contacts['cap_citta']; ?></span><br>
                            <span><?php echo $contacts['email']; ?></span><br>
                            <span><?php echo $contacts['telefono']; ?></span><br>
                        </div>

                        <div class="footer-links l-col-2">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'footer-links-1',
                                'container' => false
                            ) ); ?>
                        </div>

                        <div class="footer-links l-col-2">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'footer-links-2',
                                'container' => false
                            ) ); ?>
                        </div>


                    </footer>
                    <div class="footer-bottom">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
                    </div>
                </div>

            </div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
