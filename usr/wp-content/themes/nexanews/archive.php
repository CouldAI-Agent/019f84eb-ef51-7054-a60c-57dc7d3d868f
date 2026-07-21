<?php
/**
 * The template for displaying archive pages
 *
 * @package NexaNews
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container nexa-content-container">
        <div class="nexa-layout-row">
            <div class="nexa-main-content">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header>

                    <div class="nexa-archive-grid">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('nexa-archive-item'); ?>>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a class="nexa-post-thumbnail-link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                        <?php the_post_thumbnail('medium', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                                    </a>
                                <?php endif; ?>

                                <header class="nexa-entry-header">
                                    <?php the_title( '<h2 class="nexa-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                    <div class="nexa-entry-meta">
                                        <?php nexanews_posted_on(); ?>
                                    </div>
                                </header>
                                <div class="nexa-entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    <?php
                    the_posts_navigation();

                else :
                    ?>
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nexanews' ); ?></h1>
                        </header>
                        <div class="page-content">
                            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nexanews' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </section>
                    <?php
                endif;
                ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
