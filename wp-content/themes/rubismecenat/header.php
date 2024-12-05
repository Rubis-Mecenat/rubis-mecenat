<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rubismecenat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rubismecenat' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="wrapper flex gap-l -space -center-y">

			<div class="header-brand flex -center-y -center-x">
				<a href="/" class="logo-big" rel="home">
					<?php get_template_part('Components/Svgs/Svg', 'Logo'); ?>
				</a>
				<a href="/" class="logo-small" rel="home">
					<?php get_template_part('Components/Svgs/Svg', 'LogoSmall'); ?>
				</a>
			</div>

			<div class="flex">
				
				<nav id="site-navigation" class="main-navigation-1">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-primary-1',
								'menu_id'        => 'primary-menu',	
								'menu_class' => 'menu primary-menu-1 flex h-full',
								'container' => false,
							)
						);
					?>
				</nav><!-- #site-navigation -->

				<nav id="site-navigation" class="main-navigation-2">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-primary-2',
								'menu_id'        => 'primary-menu',	
								'menu_class' => 'menu primary-menu-2 flex h-full',
								'container' => false,
							)
						);
					?>
				</nav><!-- #site-navigation -->

				<nav class="search <?php echo is_search() ? 'current-menu-item' : ''; ?>">
					<a href="/?s=">
						<?php get_template_part('Components/Svgs/Svg', 'Search'); ?>
					</a>
				</nav>

				<nav class="lang_menu flex center-y">
					<ul id="" class="flex gap-xs">
						<?php pll_the_languages(array( 'display_names_as' => 'slug') );?>
					</ul>
				</nav>
			</div>

		</div>
	</header><!-- #masthead -->
