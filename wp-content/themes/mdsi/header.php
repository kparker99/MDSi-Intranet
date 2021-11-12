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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mdsi' ); ?></a> -->
	<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mdsi' ); ?></button> -->

	<!-- Sidebar navgation -->
	<nav>
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php endif; ?>
		
		<?php
		wp_nav_menu(
			array(
				'menu'			  => 'Primary',
				'theme_location'  => 'menu-1',
				'menu_id'         => false,
				'menu_class'	  => 'nav-list',
				'container'       => false
			)
		);
		?>
	</nav><!-- Sidebar navigation -->

	<!-- Top navigation -->
	<header>
		<?php
		wp_nav_menu(
			array(
				'menu'			  => 'Secondary',
				'theme_location'  => 'menu-2',
				'menu_id'         => false,
				'menu_class'	  => false,
				'container'       => false
			)
		);
		?>
	</header><!-- Top navigation -->