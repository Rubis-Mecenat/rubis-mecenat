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

		<div class="wrapper flex center-y gap-l space center-y">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php get_template_part('svg/svg', 'rubis-mecenat'); ?>
			</a>

			<nav id="site-navigation" class="main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-primary-1',
								'menu_id'        => 'primary-menu',	
								'menu_class' => 'flex',
								'container' => false,
							)
						);
					?>
			</nav><!-- #site-navigation -->


			<div class="flex">
				<nav id="site-navigation" class="main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-primary-2',
								'menu_id'        => 'primary-menu',	
								'menu_class' => 'flex',
								'container' => false,
							)
						);
					?>
				</nav><!-- #site-navigation -->

				<nav class="search">
					<button>
						<?php get_template_part('svg/svg', 'search'); ?>
					</button>
				</nav>

				<nav class="lang flex center-y">
					<ul id="" class="lang_menu flex gap-xs">
						<?php pll_the_languages(array( 'display_names_as' => 'slug') );?>
					</ul>
				</nav>
			</div>

		</div>
	</header><!-- #masthead -->
