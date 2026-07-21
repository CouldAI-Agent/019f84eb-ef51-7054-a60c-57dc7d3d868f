<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nexanews' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-inner">
                    <div class="trending-ticker">
                        <span class="trending-label"><?php esc_html_e('Trending:', 'nexanews'); ?></span>
                        <div class="ticker-content">
                            <!-- Ticker loop will go here -->
                        </div>
                    </div>
                    <div class="top-bar-right">
                        <div class="header-social">
                            <!-- Social icons -->
                        </div>
                        <div class="header-auth">
                            <?php if ( is_user_logged_in() ) : ?>
                                <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>"><?php esc_html_e('Logout', 'nexanews'); ?></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e('Login', 'nexanews'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-main">
            <div class="container">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    $nexanews_description = get_bloginfo( 'description', 'display' );
                    if ( $nexanews_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $nexanews_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="header-ad-space">
                    <!-- Ad space -->
                </div>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <div class="container">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                    <?php esc_html_e( 'Menu', 'nexanews' ); ?>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'primary-menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
                <div class="header-search">
                    <button class="search-toggle"><i class="fas fa-search"></i></button>
                    <div class="search-dropdown">
                        <?php get_search_form(); ?>
                        <div class="ajax-search-results"></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
