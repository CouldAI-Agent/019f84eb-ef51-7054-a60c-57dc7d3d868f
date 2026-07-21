<?php
/**
 * The front page template file
 *
 * @package NexaNews
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="nexanews-container">
        <div class="nexanews-row">
            <div class="nexanews-content-area">
                
                <!-- Hero Section -->
                <section class="hero-section">
                    <?php
                    $hero_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'meta_key'       => '_is_ns_featured_post',
                        'meta_value'     => 'yes',
                        'ignore_sticky_posts' => 1
                    );
                    $hero_query = new WP_Query( $hero_args );
                    
                    if ( $hero_query->have_posts() ) : ?>
                        <div class="hero-slider">
                            <?php while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('hero-slide'); ?>>
                                    <a href="<?php the_permalink(); ?>" class="hero-slide-link">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('large', ['class' => 'hero-img']); ?>
                                        <?php else : ?>
                                            <div class="hero-placeholder"></div>
                                        <?php endif; ?>
                                        <div class="hero-content">
                                            <div class="entry-meta">
                                                <?php nexanews_posted_on(); ?>
                                            </div>
                                            <h2 class="entry-title"><?php the_title(); ?></h2>
                                        </div>
                                    </a>
                                </article>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    <?php endif; ?>
                </section>

                <!-- Latest News Grid -->
                <section class="latest-news-section">
                    <div class="section-heading">
                        <h2 class="section-title"><?php esc_html_e( 'Latest News', 'nexanews' ); ?></h2>
                    </div>
                    
                    <div class="news-grid">
                        <?php
                        $latest_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 6,
                            'ignore_sticky_posts' => 1
                        );
                        $latest_query = new WP_Query( $latest_args );

                        if ( $latest_query->have_posts() ) :
                            while ( $latest_query->have_posts() ) : $latest_query->the_post();
                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile;
                            wp_reset_postdata();
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                </section>
                
            </div><!-- .nexanews-content-area -->
            
            <?php get_sidebar(); ?>
            
        </div><!-- .nexanews-row -->
    </div><!-- .nexanews-container -->
</main><!-- #main -->

<?php
get_footer();
