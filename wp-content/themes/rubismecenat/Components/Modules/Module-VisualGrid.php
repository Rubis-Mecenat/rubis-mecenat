<?php
    $visuals = $args['visuals'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_visual-grid wrapper">


    <?php if( $visuals ): ?>
        <div class="visual-grid">
            <?php foreach( $visuals as $visual ): ?>
                <figure>
                    <img src="<?php echo $visual['sizes']['large']; ?>">
                </figure>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>