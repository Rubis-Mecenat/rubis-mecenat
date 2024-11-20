<?php
$visuel = $args['visuel'];
$txt = $args['txt'];

?>


<section class="mod_visuel-text">

    <div class="wrapper grid gap-l">
        <figure class="mod_title s-6col">
            <img src="<?php echo $visuel['url']; ?>" alt="<?php echo $visuel["caption"]; ?>">
        </figure>
        
        <div class="mod_relations s-6col flex center-y">
            <div>
                <?php echo $txt; ?>
            </div>
        </div>
    </div>

</section>