<?php
$presskits = $args['presskits'];
?>


<section class="mod_presskits">

    <div class="mod_content wrapper">
        <?php if( $presskits ) : ?>

            <div class="grid">
                <?php foreach( $presskits as $presskit ) : ?>

                    <div class="m-6col">
                        <div class="block-presskit flex gap-l -center-y">

                            <div class="block_media">
                                <img src="<?php echo $presskit['presskit_cover']; ?>">
                            </div>

                            <div class="block_texts flex -column gap-m">
                                <h3 class="h3 -bold">
                                    <?php echo $presskit['presskit_title']; ?>
                                    <p class="h3 -light"><?php echo $presskit['presskit_date']; ?></p>
                                </h3>
                                
                                <a href="<?php echo $presskit['presskit_file']['url']; ?>" class="flex gap-s -center-y btn -filled-picto">
                                    <span class="picto"><?php get_template_part('Components/Svgs/Svg', 'Download'); ?></span>
                                    <span class="body -light"><?php echo human_filesize($presskit['presskit_file']['filesize'], 0); ?></span>
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>