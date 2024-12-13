<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="wrapper -small gap-0 mb-0">
        <div class="breadcrumb_container horizontal-slide s-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>
	</header>
</article><!-- #post-<?php the_ID(); ?> -->
