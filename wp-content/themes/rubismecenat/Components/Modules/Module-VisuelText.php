<?php
$visuel = $args['visuel'];
$txt = $args['txt'];

?>


<section class="mod_carousel">

    <figure class="mod_title ">
        <img src="<?php echo $visuel['url']; ?>" alt="<?php echo $visuel["caption"]; ?>">
    </figure>

    <div class="mod_relations">
        <?php echo $txt; ?>
    </div>

</section>