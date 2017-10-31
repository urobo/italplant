<?php
/*
 Template Name: Temporary Landing Page
*/
?>

<?php get_header(); ?>



<?php while (have_posts()) : the_post();
    if (has_post_thumbnail( $post->ID ) ): $image = get_post_thumbnail_id($post->ID); endif;
    $bg_small = (array) get_size($image, 1242, 2208, true );
    $bg_medium = (array) get_size($image, 1600 );
    $bg_large = (array) get_size($image, 2400);
    ?>

<!-- <div class="overlay-test"></div> -->
<div class="h-hero">

    <style media="screen">
                .h-hero{
                        background-image: url('<?php echo $bg_small['url'] ?>');
                }
                @media (min-width: 767px) {
                        .h-hero{
                                background-image: url('<?php echo $bg_medium['url'] ?>');
                        }
                }
                @media (min-width: 1023px) {
                        .h-hero{
                                background-image: url('<?php echo $bg_large['url'] ?>');
                        }
                }
        </style>

        <div class="l-container h-hero-content">
            <main role="main" class="l-col-8 l-col-push-2" id="posts">
                <h1><?php the_field('hero_title') ?></h1>
                <div class="yellow-divider"></div>
                <?php if( have_rows('hero_sub_title')  ):
                        while ( have_rows('hero_sub_title') ) : the_row(); ?>
                        <h3><?php the_sub_field('line') ?></h3>
                    <?php endwhile;
                endif; ?>

            </main>
        </div>

    </div>

<?php endwhile; ?>


<?php // Sub Hero 2-col content ?>
<div class="h-sub-hero">
    <div class="l-container">
        <div class="l-col-5 l-col-push-1">
            <?php echo the_field('sub_hero_left') ?>
        </div>
        <div class="l-col-5">
            <?php echo the_field('sub_hero_right') ?>
        </div>
    </div>
</div>


<?php // Home features 2-col content ?>
<?php $hf_bg = get_field('hf_background');
$hf_bg_small = (array) get_size($hf_bg, 1242, 2208, true );
$hf_bg_medium = (array) get_size($hf_bg, 1600 );
$hf_bg_large = (array) get_size($hf_bg, 2400);
?>

<style media="screen">
            .hf-pattern{
                    background-image: url('<?php echo $hf_bg_small['url'] ?>');
            }
            @media (min-width: 767px) {
                    .hf-pattern{
                            background-image: url('<?php echo $hf_bg_medium['url'] ?>');
                    }
            }
            @media (min-width: 1023px) {
                    .hf-pattern{
                            background-image: url('<?php echo $hf_bg_large['url'] ?>');
                    }
            }
    </style>

<div class="h-features">
    <div class="hf-pattern"></div>


        <div class="l-container">
            <div class="l-col-4 l-col-push-1 hf-content">
                <h2><?php echo the_field('hf_title_left') ?></h2>
                <div class="yellow-divider-left"></div>
                <div class="hf-list">
                    <?php echo the_field('hf_content_left') ?>
                </div>
            </div>
            <div class="l-col-4 l-col-push-1 hf-content">
                <h2><?php echo the_field('hf_title_right') ?></h2>
                <div class="yellow-divider-left"></div>
                <div class="hf-list">
                    <?php echo the_field('hf_content_right') ?>
                </div>
            </div>
        </div>

</div>



<?php // Home contact 2-col content ?>
<?php
    $hc_bg = get_field('h-landscape');

 ?>
<div class="h-contacts">
    <div class="l-container">
        <div class="l-col-10 l-col-push-1 hc-landscape">
            <img class="" <?php acf_img_srcset($hc_bg,'large',12); ?>alt="<?php echo $hc_bg['alt']; ?>">
        </div>
        <div class="l-col-4 l-col-push-1 hc-left">
            <h3><?php echo the_field('hc-title-left'); ?></h3>
            <?php echo the_field('hc-content-left'); ?>
        </div>
        <div class="l-col-4 l-col-push-2 hc-right">
            <h3><?php echo the_field('hc-title-right'); ?></h3>
            <?php echo the_field('hc-contactform-right'); ?>
        </div>
    </div>
</div>

<?php /* The Hero ?>

<?php if( have_rows('slider') ): ?>
    <?php while ( have_rows('slider') ) : the_row();

        $image = get_sub_field('backgroud');
        $main_cta = get_sub_field('main_cta_btn');
        $secondary_cta = get_sub_field('secondary_cta_btn');

        $bg_small = (array) get_size($image, 1242, 2208, true );
        $bg_medium = (array) get_size($image, 1600 );
        $bg_large = (array) get_size($image, 2400);

        if ( get_sub_field('main_type_selector') == 'link'):
            $main_link = get_sub_field('main_link');
        else:
            $main_link = '#'.get_sub_field('main_anchor');
        endif;

        ?>

        <div class="hero-main">
            <div class="hero-image">

                <style media="screen">
                    .hero-image{
                            background-image: url('<?php echo $bg_small['url'] ?>');
                    }
                    @media (min-width: 767px) {
                            .hero-image{
                                    background-image: url('<?php echo $bg_medium['url'] ?>');
                            }
                    }
                    @media (min-width: 1023px) {
                            .hero-image{
                                    background-image: url('<?php echo $bg_large['url'] ?>');
                            }
                    }
                </style>

                <div class="heaven-gradient"></div>

            </div>


            <div class="hero-content">

                <div class="l-container">
                    <div class="l-col-6 l-col-push-3">
                        <h1 class="carousel-title"><?php echo get_sub_field('title'); ?></h1>
                    </div>
                </div>

            </div>


        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php // Main Features ?>

<?php if( have_rows('main_features')  ): ?>
<div id="features" class="main-features-container">


    <?php
      $i = 0;
      while ( have_rows('main_features') ) : the_row();
      $icon = get_sub_field('icon');
      $title = get_sub_field('title');
      $content = get_sub_field('content');
    ?>

        <div class="mf-container">

            <div class="feature-<?php echo $i ?> mf-content">

                <div class="mf-icon">
                    <?php if( get_sub_field('icon') ): ?>
                        <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" class="mf-single-icon">
                    <?php endif; ?>
                </div>

                <div class="mf-single-title">
                    <?php echo $title; ?>
                </div>

                <div class="mf-single-content">
                    <?php echo $content ?>
                </div>

            </div>

        </div>
        <?php $i++ ?>
    <?php endwhile; ?>

</div>
<?php endif; ?>



<?php // Card Video - scrollControl ?>

<?php
  $after_hero_title = get_field('emergency_card_title');
  $after_hero_sub_title = get_field('emergency_card_sub_title');
  $after_hero_content = get_field('emergency_card_content');
 ?>

<div id="intro" class="intro-engelcard ">
    <div class="l-container mwc">
        <div class="l-col-5 l-col-push-1 block-card">
            <div id="animationCard"></div>
        </div>
        <div class="l-col-5 block-content">
            <h2><?php echo $after_hero_title ?></h3>
            <h3><?php echo $after_hero_sub_title ?></h4>
            <p>
                <?php echo $after_hero_content ?>
            </p>

        </div>
    </div>
</div>


<?php // App Features Slider ?>

<?php if( have_rows('home_single_case') ): ?>

<?php $i=0; ?>

<div id="features-slider" class="app-feature-slider">

    <div class="l-container mwc">

        <div class="l-col-5 l-col-push-1 app-slider-nav">
            <h2><?php echo the_field('app_slider_title') ?></h2>
            <ul>
                <?php
                  $i = 0;
                  $class = ' is-selected';
                  while ( have_rows('app_slide') ) : the_row();
                      $title = get_sub_field('title');
                      $content = get_sub_field('description');
                      if ($i != 0){ $class='';}
                ?>
                    <li class="slider-nav<?php echo $class; ?>"><b><?php echo $title; ?></b> - <?php echo $content; ?></li>

                <?php
                    $i++;
                    endwhile; ?>
            </ul>

            <?php
            // App stores btns
            $apple_store_btn = get_field('apple_store_btn');
            $apple_store_link = get_field('apple_store_btn_link');
            $play_store_btn = get_field('play_store_btn');
            $play_store_link = get_field('play_store_btn_link');

            if($apple_store_btn||$play_store_btn):
            ?>

                <div class="app-stores-buttons">
                    <a href="<?php echo $apple_store_link; ?>" class="app-store-link">
                        <img src="<?php echo $apple_store_btn['url']; ?>" alt="<?php echo $apple_store_btn['alt']; ?>" class="img-app-btn">
                    </a>
                    <a href="<?php echo $play_store_link; ?>" class="app-store-link">
                        <img src="<?php echo $play_store_btn['url']; ?>" alt="<?php echo $play_store_btn['alt']; ?>" class="img-app-btn">
                    </a>
                </div>

            <?php endif; ?>
        </div>

        <div class="app-slider-mask-wrapper">
            <div class="app-slider-gallery">

                    <?php
                      while ( have_rows('app_slide') ) : the_row();
                          $image = get_sub_field('slide');
                    ?>

                        <div class="app-screen"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" width="208" height="369"></div>
                    <?php endwhile; ?>
            </div>
            <script type="text/javascript">

            </script>
            <img class="slider-mask" src="<?php echo get_template_directory_uri(); ?>/assets/images/hand-with-device.png" alt="">

        </div>


    </div>

</div>

<?php endif; ?>


<?php // Testimonials slider ?>

<div id="testimonials" class="testimonials-container">


    <div class="swiper-wrapper">

    <?php if( have_rows('single_testimonial') ): ?>
        <?php while( have_rows('single_testimonial') ) : the_row();

            // Retrive variables
            $portrait = get_sub_field('portrait');
            $name = get_sub_field('name');
            $position = get_sub_field('position');
            $quote = get_sub_field('quote');
        ?>
          <div class="swiper-slide l-container">
              <!-- Hide testimonial portrait -->
              <!-- <div class="l-col-4 hide-s">
                  <div class="doctor-portrait" style="background-image: url(<?php echo $portrait['url'] ?>);"></div>
              </div> -->
              <!-- BU: l-col-7 for the content -->
              <div class="l-col-8 l-col-push-2 single-testimonial">
                  <div class="st-quote"><?php echo $quote ?></div>
                  <div class="st-name"><?php echo $name ?></div>
                  <div class="st-position"><?php echo $position ?></div>
              </div>
          </div>

      <?php endwhile; ?>
    <?php endif; ?>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

</div>

<?php // Security ?>
<?php if( have_rows('security_option')  ):?>
<div class="security-wrapper heaven-gradient-blue-bottom">
    <div class="l-container security-bg">
        <h2 class="l-col-5 l-col-push-2 security-main-title"><?php echo the_field('security_title') ?></h2>
        <?php
        $i = 0;
        while ( have_rows('security_option') ) : the_row();
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $description = get_sub_field('description');?>
            <style media="screen">
                .icon-<?php echo $i; ?>::before{
                    background-image: url('<?php echo $icon['url']; ?>');
                }
            </style>
            <?php if ($i%2==0){
                $colPush = 'l-col-push-2';
            } else {
                $colPush = 'l-col-push-1';
            }?>
            <div class="l-col-3 <?php echo $colPush; ?> security-single icon-<?php echo $i; ?> l-mar">
                <span class="security-title"><?php echo $title; ?></span>
                <span class="security-description"><?php echo $description; ?></span>
            </div>

        <?php
        $i++;
        endwhile; ?>



    </div>

</div>


<?php // Pricing Tabs ?>
<div id="pricing" class="pricing-tab">
    <div class="l-container">
        <div class="pricing-tab-wrap l-col-10 l-col-push-1">

            <div class="pricing-tab-head">

                <div class="l-col-4">
                    <h5><?php echo get_field('features_title') ?></h5>
                </div>

                <div class="l-col-4 free-title">
                    <h5><?php echo get_field('free_title') ?></h5>
                </div>

                <div class="l-col-4 premium-head">
                    <h2 class="premium-title"><?php echo get_field('premium_title') ?></h2>
                    <span class="premium-price"><?php echo get_field('premium_price') ?></span>
                </div>

            </div>

            <?php if( have_rows('features')  ):?>
                <div class="pt-features">

                    <?php
                    $i=1;
                    $rowCount = count( get_field('features'));
                    $lastclass = '';

                    while ( have_rows('features') ) : the_row();

                        if ($i == $rowCount) : $lastclass = ' last-row'; else: $i++; endif; ?>
                        <div class="l-container pt-row">

                            <div class="l-col-4 feature<?php echo $lastclass ?>">
                                <a href="#" class="info">i
                                    <span class="popover">
                                        <?php echo the_sub_field('description') ?>
                                    </span>
                                </a>
                                <?php echo the_sub_field('name') ?>
                            </div>
                            <div class="l-col-4 free<?php echo $lastclass ?>">
                                <?php $free = get_sub_field('free');
                                if ($free):
                                    echo '<div class="check"></div>';
                                else:
                                    echo '-';
                                endif;?>
                            </div>
                            <div class="l-col-4 premium<?php echo $lastclass ?>">
                                <?php $premium = get_sub_field('premium');
                                if ($premium):
                                    echo '<div class="check"></div>';
                                else:
                                    echo '-';
                                endif;?>
                            </div>

                        </div>
                    <?php endwhile; ?>

                </div>
            <?php endif; ?>


            <div class="pricing-tab-btns">

                <div class="l-col-4 l-col-push-4">
                    <a href="<?php echo get_field('free_link') ?>" target="_blank" class="pt-btn free">
                            <?php echo get_field('free_button') ?>
                    </a>
                </div>

                <div class="l-col-4">
                    <a href="<?php echo get_field('premium_link') ?>" target="_blank" class="pt-btn premium">
                            <?php echo get_field('premium_button') ?>
                    </a>
                </div>

            </div>


        </div>

    </div>
</div>

<div class="blog-home">

    <div class="l-container">
        <?php

        $query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 3
        ) );

        while ($query->have_posts()) : $query->the_post();
            get_template_part( 'template-parts/content', 'loop-home' );
        endwhile;

        wp_reset_postdata();
        ?>

    </div>

    <div class="l-container">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>" class="blog-btn l-col-4 l-col-push-4">
            <?php echo the_field('btn_blog_label'); ?>
        </a>
    </div>

</div>

<?php endif; */?>

<?php get_footer(); ?>
