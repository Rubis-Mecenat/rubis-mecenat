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

	<!-- TarteAuCitron Cookies -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/tarteaucitron/tarteaucitron.js"></script>

	<script type="text/javascript">
		tarteaucitron.init({
		"privacyUrl": "", /* Privacy policy url */
		"bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

		"hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
		"cookieName": "tarteaucitron", /* Cookie name */

		"orientation": "bottom", /* Banner position (top - bottom) */

		"groupServices": false, /* Group services by category */
						
		"showAlertSmall": false, /* Show the small banner on bottom right */
		"cookieslist": false, /* Show the cookie list */
						
		"closePopup": false, /* Show a close X on the banner */

		"showIcon": false, /* Show cookie icon to manage cookies */
		//"iconSrc": "", /* Optionnal: URL or base64 encoded image */
		"iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

		"adblocker": false, /* Show a Warning if an adblocker is detected */
						
		"DenyAllCta" : true, /* Show the deny all button */
		"AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
		"highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */
						
		"handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

		"removeCredit": false, /* Remove credit link */
		"moreInfoLink": true, /* Show more info link */

		"useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
		"useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */						
		"readmoreLink": "", /* Change the default readmore link */

		"mandatory": true, /* Show a message about mandatory cookies */
		"mandatoryCta": true /* Show the disabled accept button when mandatory on */
		});
		(tarteaucitron.job = tarteaucitron.job || []).push('vimeo');
		(tarteaucitron.job = tarteaucitron.job || []).push('matomo');
	</script>



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
				<a href="<?php echo get_bloginfo('url'); ?>" class="logo-big" rel="home" aria-label="Retourner à la page d'accueil">
					<?php get_template_part('Components/Svgs/Svg', 'Logo'); ?>
				</a>
				<a href="<?php echo get_bloginfo('url'); ?>" class="logo-small" rel="home" aria-label="Retourner à la page d'accueil">
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
						<a href="/?s=" aria-label="Effectuer une recherche sur le site">
							<?php get_template_part('Components/Svgs/Svg', 'Search'); ?>
						</a>
					</nav>

					<nav class="lang_menu flex -center-y">
						<ul id="" class="flex gap-xs">
							<?php if( function_exists('pll_the_languages') ) { pll_the_languages(array( 'display_names_as' => 'slug') ); }?>
						</ul>
					</nav>
				</div>

				<div class="footer-nav on-mobile">
					
					<div class="mt-l mb-l">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-footer-1',
							'menu_id'        => 'footer-menu',
							'menu_class'	 => 'menu-footer-1 menu flex -column gap-s',
						)); ?>
					</div>

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
