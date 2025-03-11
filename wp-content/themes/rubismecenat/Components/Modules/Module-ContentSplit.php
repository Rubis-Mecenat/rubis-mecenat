<?php
    $title = $args['title'];
    $medias = $args['medias'];
    $content = $args['content'];
    $design = $args['design'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_contentSplit">

    <?php if( $title !=='' ) : ?>
        <div class="wrapper">
            <h2 class="mb-xl"><?php echo $title; ?></h2>
        </div>
    <?php endif; ?>

    <div class="grid gap-s wrapper <?php echo '-'.$design; ?>">

        <div class="t-12col m-6col <?php echo $design === 'left' ? '-end' : ''; ?> mod_txt">
            <div class="body"><?php echo $content; ?></div>
        </div>

        <div class="t-12col m-5col <?php echo $design === 'right' ? '-end' : ''; ?> mod_media <?php echo count($medias) >= 2 ? 'swiper content-split' : ''; ?>">
            <?php if( $medias ): ?>
                <div class="swiper-wrapper">
                    <?php foreach( $medias as $media ): ?>
                        <?php
                            rubismecenat_attachment( $media, 
                                array ( 
                                    'figure_class' => 'swiper-slide ratio-square', 
                                    'img_class' => 'h-full '
                                ) 
                            ); 
                        ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</section>