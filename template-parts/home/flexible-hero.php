<?php
/**
 * Template part for the hero content on the template-home.php
 */
?>
<?php while (have_posts()) : the_post();
    if (has_post_thumbnail( $post->ID ) ): $image = get_post_thumbnail_id($post->ID); endif;
    $bg_small = (array) get_size($image, 1242, 2208, true );
    $bg_medium = (array) get_size($image, 1600 );
    $bg_large = (array) get_size($image, 2400);
    $cta_left = get_field('call_to_action_button_left');
    $cta_right = get_field('call_to_action_button_right');
    $hero_logo = get_field('hero_logo');
    ?>

<div class="h-hero">

    <video playsinline autoplay muted loop poster="<?php echo $bg_large['url'] ?>" id="bgvideo" width="x" height="y">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/hero/hero-bg-video-6.mp4" type="video/mp4">
    </video>

    <style media="screen">
        @media screen and (max-width: 768px) {
            .h-hero{
                background-image: url('<?php echo $bg_large['url'] ?>');
            }
        }
    </style>

    <div class="l-container h-hero-content">
        <main role="main" class="l-col-8 l-col-push-2" id="posts">
            <div class="hero-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white-shadow.svg" alt="Italplant Logo"/>
            </div>
            <h1><?php the_field('hero_title') ?></h1>
            <div class="yellow-divider"></div>
            <?php if( have_rows('hero_sub_title')  ):
                    while ( have_rows('hero_sub_title') ) : the_row(); ?>
                    <h3><?php the_sub_field('line') ?></h3>
                <?php endwhile;
            endif; ?>

            <?php if ($cta_left || $cta_right): ?>
                <div class="h-cta-buttons">

                    <?php if($cta_left):
                        $cta_letf_content = get_field('cta_left');

                        if ($cta_letf_content['link_to'] == 'page') {
                            $cta_letf_link = $cta_letf_content['link_to_page'];
                        }
                        elseif($cta_letf_content['link_to'] =='anchor') {
                            $cta_letf_link = '#'.$cta_letf_content['anchor_link'];
                        }
                        ?>

                        <a href="<?php echo $cta_letf_link; ?>"class="h-cta-left">
                            <?php echo $cta_letf_content['label']; ?>
                        </a>
                    <?php endif;

                    if($cta_right):
                        $cta_right_content = get_field('cta_right');

                        if ($cta_right_content['link_to'] == 'page') {
                            $cta_right_link = $cta_right_content['link_to_page'].'/#contact-form';
                        }
                        elseif($cta_letf_content['link_to'] =='anchor') {
                            $cta_right_link = '#'.$cta_right_content['anchor_link'];
                        }
                        ?>

                        <a href="<?php echo $cta_right_link; ?>"class="h-cta-right">
                            <?php echo $cta_right_content['label']; ?>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </main>
    </div>

</div>

<?php endwhile; ?>
