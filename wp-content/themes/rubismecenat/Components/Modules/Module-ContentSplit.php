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

        <div class="s-12col m-6col mod_txt">
            <div class="body"><?php echo $content; ?></div>
        </div>


        <div class="s-12col m-5col -end mod_media <?php echo count($medias) >= 2 ? 'swiper content-split' : ''; ?>">
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