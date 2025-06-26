=== Footer Mega Grid Columns Pro ===
Tags: footer, footer widgets, footer widgets in grid, simple footer editor, mega footer, megafooter
Contributors: wponlinesupport, anoopranawat 
Requires at least: 3.1
Tested up to: 4.8
Author URI: http://wponlinesupport.com
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Footer Mega Grid Columns - Register a widget area for your theme and allow you to add and display widgets in grid view with multiple columns

== Description ==
Is your footer stuck in the default "3 or 4 columns" that came with your theme?

Footer Mega Grid Columns - Register a widget area for your theme and allow you to add and display widgets in grid view with multiple columns.

The site footer is a valuable piece of site real estate, often containing important lead generating items such as mailchimp and social. A well designed footer can be a tremendous benefit.

Check [DEMO](http://demo.wponlinesupport.com/footer-mega-grid-columns-demo/) for more details.

= Features =
* Add a Footer widget ie Footer Mega Grid Columns .
* Display all widgets in grid 1,2,3,4 etc under Footer Mega Grid Columns

= How to display =
Add the following code in your footer.php 
<code><?php if( function_exists('fmgc_pro_display_widgets') ) { echo fmgc_pro_display_widgets(); } ?></code>


== Installation ==

1. Upload the 'footer-mega-grid-columns' folder to the '/wp-content/plugins/' directory.
2. Activate the "Footer Mega Grid Columns" list plugin through the 'Plugins' menu in WordPress.
3. Check you Widget section for widget name Footer Mega Grid Columns.
4. Add the following code in your footer.php file under <code><footer></code> tag.
<code><?php if( function_exists('fmgc_pro_display_widgets') ) { echo fmgc_pro_display_widgets(); } ?></code>


== Changelog ==

= 1.1.1 (8, July 2017) =
* Fixed : Widget saveing issue.

= 1.1 (31, Jan 2017) =
* [+] Added inner Wrap width of footer in PX under setting section.
* [+] Added ::after and ::before for .footer-mega-col class.
* [+] Added .footer-mega-col-wrap class as child class for .footer-mega-col to handle the width of inner wrap.
* Fixed : Content color issue added from setting.

= 1.0 (10, Jan 2017) =
* Initial release.

== Upgrade Notice ==

= 1.1.1 (8, July 2017) =
* Fixed : Widget saveing issue.

= 1.1 (31, Jan 2017) =
* [+] Added inner Wrap width of footer in PX under setting section.
* [+] Added ::after and ::before for .footer-mega-col class.
* [+] Added .footer-mega-col-wrap class as child class for .footer-mega-col to handle the width of inner wrap.
* Fixed : Content color issue added from setting.

= 1.0 (10, Jan 2017) =
* Initial release.