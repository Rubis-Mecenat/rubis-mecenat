<?php
    $title = $args['title'];
    $medias = $args['medias'];
    $content = $args['content'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_carousel">

    <div class="wrapper">
        <h2 class="txt-center mb-l"><?php echo $title; ?></h2>
    </div>

    <div class="grid gap-l wrapper">

        <div class="m-6col">
            <div><?php echo $content; ?></div>
        </div>

        <div class="m-6col <?php echo count($medias) >= 2 ? 'swiper content-split' : ''; ?>">
            <?php if( $medias ): ?>
            <div class="swiper-wrapper">
                <?php foreach( $medias as $media ): ?>
                <figure class="swiper-slide ratio-square">
                    <img class="h-full " src="<?php echo $media["url"]; ?>">
                </figure>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>



</section>