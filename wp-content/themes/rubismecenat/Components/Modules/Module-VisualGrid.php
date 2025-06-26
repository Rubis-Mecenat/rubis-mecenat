<?php
    $visuals = $args['visuals'];
?>

<section class="mod_visual-grid wrapper">


    <?php if( $visuals ): ?>
        <div class="visual-grid">
            <?php 
                foreach( $visuals as $visual ): 
                    rubismecenat_attachment($visual, null, 'theme_small');
                endforeach; ?>
        </div>
    <?php endif; ?>

</section>