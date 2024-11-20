<?php
    $title = $args['title'];
    $medias = $args['medias'];
    $content = $args['content'];
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>

<section class="mod_carousel">

    <div class="flex">
        <h2><?php echo $title; ?></h2>
    </div>

    <div class="grid">

        <div class="m-6col">
            <div><?php echo $content; ?></div>
        </div>

        <div class="m-6col">
            <?php if( $medias ): ?>
                <div class="">
                    <?php foreach( $medias as $media ): ?>
                        <figure>
                            <img src="<?php echo $media["url"]; ?>">
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>



</section>