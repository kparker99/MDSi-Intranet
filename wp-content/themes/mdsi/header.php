<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MDSi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/inf3ofe.css"> <!-- Adobe Fonts -->
	<?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>
	<header>
		<?php 
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }?>
		<nav>
			<?php
			wp_nav_menu(
				array(
					'menu'			  => 'Primary',
					'theme_location'  => 'menu-1',
					'menu_id'         => false,
					'menu_class'	  => false,
					'container'       => false
				)
			);
			?>
		</nav>
	</header>