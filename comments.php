<?php
/*
 * The comments page for italplant
 */

// don't load it if you can't comment
if ( post_password_required() ) { return; }
?>

<?php if ( have_comments() ) : ?>

    <h3 id="comments-title">
        <?php comments_number( __( '<span>No</span> Comments', 'italplant' ), __( '<span>One</span> Comment', 'italplant' ), __( '<span>%</span> Comments', 'italplant' ) );?>
    </h3>

    <section class="commentlist">

        <!-- The comment list -->
        <?php wp_list_comments(); ?>

        <!-- The comment pagination -->
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div class="pagination">
                <?php paginate_comments_links() ?>
            </div>
        <?php endif; ?>

        <!-- No comment -->
        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments">
                <?php _e( 'Comments are closed.' , 'italplant' ); ?>
            </p>
        <?php endif; ?>
    </section>

<?php endif; ?>

<?php comment_form(); ?>
