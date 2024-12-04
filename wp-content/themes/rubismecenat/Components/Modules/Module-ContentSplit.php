<?php
    $title = $args['title'];
    $medias = $args['medias'];
    $content = $args['content'];
    $design = $args['design'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_contentSplit">

    <div class="wrapper">
        <h2 class="txt-center mb-xl"><?php echo $title; ?></h2>
    </div>

    <div class="grid gap-l wrapper <?php echo '-'.$design; ?>">

        <div class="m-6col mod_txt">
            <div class="body"><?php echo $content; ?></div>
        </div>

        <div class="m-1col"></div>

        <div class="m-5col mod_media <?php echo count($medias) >= 2 ? 'swiper content-split' : ''; ?>">
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