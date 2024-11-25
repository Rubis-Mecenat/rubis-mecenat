<?php
    /**
     * Search Form Part
     */

?>

<form role="search" method="get" class="search-form flex space center-y" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class=" flex center-y">
        <span class="screen-reader-text">Rechercher&nbsp;:</span>
        <?php get_template_part('Components/Svgs/Svg', 'Search'); ?>
        <input type="search" class="search-field" placeholder="Rechercher…" value="" name="s">
        <?php get_template_part('Components/Svgs/Svg', 'Close'); ?>
    </label>

    <button  class="search-submit" aria-label="Rechercher sur le site"> 
        <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
    </button>
</form>