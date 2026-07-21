<?php
/**
 * The template for displaying all single posts
 *
 * @package NexaNews
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container nexa-content-container">
        <div class="nexa-layout-row">
            <div class="nexa-main-content">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('nexa-single-post'); ?>>
                        <header class="nexa-entry-header">
                            <div class="nexa-entry-meta">
                                <?php nexanews_posted_on(); ?>
                            </div>
                            <?php the_title( '<h1 class="nexa-entry-title">', '</h1>' ); ?>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="nexa-post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="nexa-entry-content">
                            <?php
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nexanews' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>

                        <footer class="nexa-entry-footer">
                            <?php
                            /* translators: used between list items, there is a space after the comma */
                            $categories_list = get_the_category_list( esc_html__( ', ', 'nexanews' ) );
                            if ( $categories_list ) {
                                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'nexanews' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            }

                            /* translators: used between list items, there is a space after the comma */
                            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'nexanews' ) );
                            if ( $tags_list ) {
                                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'nexanews' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            }
                            ?>
                        </footer>
                    </article>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
