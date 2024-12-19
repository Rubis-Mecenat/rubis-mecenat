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

	<!-- Matomo -->
	<script>
	var _paq = window._paq = window._paq || [];
	/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//stats.rubismecenat.fr/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '1']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	})();
	</script>
	<!-- End Matomo Code -->
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rubismecenat' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="header-container flex gap-l -space -center-y">

			<div class="header-brand flex -center-y -center-x">
				<a href="/" class="logo-big" rel="home">
					<?php get_template_part('Components/Svgs/Svg', 'Logo'); ?>
				</a>
				<a href="/" class="logo-small" rel="home">
					<?php get_template_part('Components/Svgs/Svg', 'LogoSmall'); ?>
				</a>
			</div>

			<input type="checkbox" class="burger-input on-mobile" id="burger">
			<label class="burger-menu -black on-mobile" for="burger">
				<span class="burger-menu__stick"></span>
				<span class="burger-menu__stick"></span>
			</label>

			<div class="navigations-container">
				<div class="header-nav flex m:-column">	
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

					<nav class="lang_menu flex -center-y">
						<ul id="" class="flex gap-xs">
							<?php pll_the_languages(array( 'display_names_as' => 'slug') );?>
						</ul>
					</nav>
				</div>

				<div class="footer-nav on-mobile">
					
					<div class="mt-l mb-l">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-footer-2',
							'menu_id'        => 'footer-menu',
							'menu_class'	 => 'menu-footer-2 menu flex -column gap-s',
						)); ?>
					</div>
					<div class="mb-m">
						<h3 class="h1">Newsletter</h3>
						
						<?php get_template_part('Components/Modules/Module', 'NewsletterForm'); ?>
					</div>
					<div>
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-footer-last',
							'menu_id'        => 'footer-menu',
							'menu_class' => 'menu-footer-last menu flex -center-y gap-m',
						)); ?>
					</div>
				</div>

			</div>

		</div>



	</header><!-- #masthead -->
