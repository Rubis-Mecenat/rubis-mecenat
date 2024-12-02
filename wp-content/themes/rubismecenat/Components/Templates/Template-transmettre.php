<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="wrapper gap-0 mb-0">

        <div class="project_breadcrumb s-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>
<!-- 
        <div class="m-6col mod_cover is-relative">

            <?php rubismecenat_post_thumbnail(); ?>
            
            <div class="content-absolute">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
        </div>

        <div class="m-6col mod_content flex -center-y">
            <div class="body-title">
                <?php the_content(); ?>
            </div>
        </div> -->
        
	</header>


</article><!-- #post-<?php the_ID(); ?> -->
