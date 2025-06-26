<?php
$menu1 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer Restaurants',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu2 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer HVAC',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu3 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer Hoods',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu4 = wp_nav_menu(
	array(
	     'menu'                 => 'Food Truck Design',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu5 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer General Contracting',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu6 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer Fire Supression Systems',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);

$menu7 = wp_nav_menu(
	array(
	     'menu'                 => 'Footer Other',
		'theme_location' => '',
		'container'      => '',
		'menu_class'     => 'menu',
		'echo'           => false
	)
);


global $wps_options;
?>
<div class="footer-mega-col">
    <div class="footer-mega-col-wrap">
        <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">RESTAURANT SERVICES</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu1; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">HVAC</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu2; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-8  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">HOODS</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu3; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">FOOD TRUCK DESIGN</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu4; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">GENERAL CONTRACTING</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu5; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">FIRE PROTECTION</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu6; ?>
            </div>
        </aside>
        
         <aside class="fmgcp-grid-7  widget fmgcp-columns widget_nav_menu">
            <h4 class="widget-title">OTHER LINKS</h4>
            <div class="menu-footer-restaurants-container">
               <?php echo $menu7; ?>
            </div>
        </aside>
        
    </div>
</div>