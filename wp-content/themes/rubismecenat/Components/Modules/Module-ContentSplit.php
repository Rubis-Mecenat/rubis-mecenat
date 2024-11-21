<?php
    $title = $args['title'];
    $medias = $args['medias'];
    $content = $args['content'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_carousel">

    <div class="flex wrapper">
        <h2 class="txt-center mb-l"><?php echo $title; ?></h2>
    </div>

    <div class="grid gap-l">

        <div class="m-6col">
            <div><?php echo $content; ?></div>
        </div>

        <div class="m-6col">
            <?php if( $medias ): ?>
                <div class="grid">
                    <?php foreach( $medias as $media ): ?>
                        <figure class="s-12col">
                            <img src="<?php echo $media["url"]; ?>">
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>



</section>