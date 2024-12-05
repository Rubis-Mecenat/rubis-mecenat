<?php
    $visuals = $args['visuals'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_visual-grid wrapper">


    <?php if( $visuals ): ?>
        <div class="visual-grid">
            <?php 
                foreach( $visuals as $visual ): 
                    rubismecenat_attachment($visual);
                endforeach; ?>
        </div>
    <?php endif; ?>

</section>