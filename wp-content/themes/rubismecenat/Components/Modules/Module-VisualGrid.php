<?php
    $visuals = $args['visuals'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_carousel">


    <?php if( $visuals ): ?>
        <div class="">
            <?php foreach( $visuals as $visual ): ?>
                <figure>
                    <img src="<?php echo $visual["url"]; ?>">
                </figure>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>