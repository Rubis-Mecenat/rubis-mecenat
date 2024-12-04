<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rubismecenat
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">
			<?php pll_e("Nous n'avons pas trouvé de contenu."); ?>        
		</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>

			<p>
				<?php pll_e("Désolé, aucun contenu ne correspond à votre recherche. Veuillez essayer différents termes."); ?> 
			</p>
			<?php
			get_search_form();

		else : ?>

			<p>
				<?php pll_e("Désolé, aucun contenu ne correspond à votre recherche. Veuillez essayer différents termes."); ?> 
			
			<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rubismecenat' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
