<?php
$visuel = $args['visuel'];
$txt = $args['txt'];
?>


<section class="mod_visuel-text entry-header">

    <div class="grid gap-0">
        <figure class="mod_cover t-12col m-6col">
            <img src="<?php echo $visuel['sizes']['theme_medium']; ?>" alt="<?php echo $visuel["caption"]; ?>">
        </figure>
        
        <div class="mod_content t-12col m-6col flex -center-y">
            <div class="body-title">
                <?php echo $txt; ?>
            </div>
        </div>
    </div>

</section>