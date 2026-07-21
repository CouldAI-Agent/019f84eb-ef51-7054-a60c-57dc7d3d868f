<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main container">
    <div class="news-section">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Latest News', 'nexanews' ); ?></h1>
        </header>

        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                endwhile;
                the_posts_navigation();
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_sidebar();
get_footer();
