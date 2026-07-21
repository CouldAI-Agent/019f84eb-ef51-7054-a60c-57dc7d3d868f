    <footer id="colophon" class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                    <div class="footer-widget-area">
                        <div class="newsletter-widget">
                            <h3><?php esc_html_e('Newsletter', 'nexanews'); ?></h3>
                            <p><?php esc_html_e('Subscribe to our newsletter for the latest updates.', 'nexanews'); ?></p>
                            <form class="newsletter-form">
                                <input type="email" placeholder="<?php esc_attr_e('Email address', 'nexanews'); ?>" required>
                                <button type="submit"><?php esc_html_e('Subscribe', 'nexanews'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-info">
            <div class="container">
                <div class="site-info-inner">
                    <div class="copyright">
                        &copy; <?php echo date_i18n( _x( 'Y', 'copyright date format', 'nexanews' ) ); ?> 
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. 
                        <?php esc_html_e('All rights reserved.', 'nexanews'); ?>
                    </div>
                    <div class="footer-menu">
                        <?php
                        if ( has_nav_menu( 'footer' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer',
                                    'depth'          => 1,
                                    'fallback_cb'    => false,
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>