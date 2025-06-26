<?php
$menu_main = wp_nav_menu(
	array(
		'theme_location' => 'main-menu',
		'container'      => '',
		'menu_class'     => 'sf-menu',
		'echo'           => false
	)
);
global $wps_options;
?>

<header id="masthead" class="site-header" role="banner"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <div class="logo-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo logo-home">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                                    src="<?php echo WPS_THEME_URI; ?>/assets/images/logo-main.png"  width="221" height="67" alt="Hood Builder Logo"></a>
                    </div>
                    <div class="topbar-callus">
                        <span>
                            <a href="tel:+1-303-777-7720">(303) 777 7720</a>
                        </span>
                    </div>
                    <div class="topbar-search">
                        <form action="<?php echo home_url(); ?>" method="get" class="search-form" enctype="application/x-www-form-urlencoded">

                            <div class="search-input-env">
                                <input type="text" class="search-input" name="s" placeholder="<?php _e('Search...', 'wpsbase'); ?>" value="<?php echo esc_html(get_search_query()); ?>">

                                <button type="submit" class="mobile-search-button">
                                    <i class="fa fa-search cover-search-submit"></i>
                                </button>
                            </div>

                        </form>
<!--                        <form class="cover-search-form" method="get" action="--><?php //echo esc_url(home_url('/')); ?><!--">-->
<!--                            <i class="fa fa-search cover-search-submit"></i>-->
<!--                            <input type="text" name="s" class="cover-search-input" value="--><?php //echo esc_html(get_search_query()); ?><!--" autocomplete="off">-->
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-bar-wrap">
        <div class="container-fluid">
            <div id="nav-bar" class="nav-bar-container">

                <div class="nav-bar-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Logo</a>
                </div>
                <nav class="header-navigation" role="navigation">
					<?php echo $menu_main; ?>
                </nav>

                <div class="nav-bar-right">
                    <div class="topbar-callus">
                        <a href="tel:+1-303-777-7720">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>(303) 777 7720</span>
                        </a>
                    </div>
                    <div class="get-quote-btn">
                        <a class="js-scroll-trigger" href="#get-quote-form">Get Quote</a>
                    </div>
                </div>
                <div id="dl-menu" class="dl-menuwrapper">
                    <button class="btn-mobile dl-trigger">
                        <div id="mobile-nav-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
	                <?php
	                wp_nav_menu(array(
		                'theme_location' => 'main-menu',
		                'items_wrap' => '<ul class="dl-menu">%3$s</ul>',
		                'container_class' => false,
		                'container' => false,
		                'walker' => new My_Sub_Menu

	                ));
	                ?>
                </div>
            </div>
        </div>
    </div>
</header>


<?php

if(is_page_template('template-servicepage.php')) {
get_template_part( 'template-components/header/service-menu' );
}

?>

<?php

if ( ! is_front_page() ) {
	get_template_part( 'template-components/header/header-title' );
}

?>
