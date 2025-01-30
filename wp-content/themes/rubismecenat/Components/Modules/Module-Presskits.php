<?php
$presskits = $args['presskits'];
?>


<section class="mod_presskits">

    <div class="mod_content wrapper">
        <?php if( $presskits ) : ?>
            
            <?php if( get_sub_field('presskits_title') ) : ?>
                <h2 class="mb-l txt-center"><?= get_sub_field('presskits_title') ?></h2>
            <?php endif; ?>
         
            <div class="grid">
                <?php foreach( $presskits as $presskit ) : ?>

                    <div class="t-12col m-12col mb-m">
                        <div class="block-presskit">

                            <!-- <div class="block_media">
                                <img src="<?php echo $presskit['presskit_cover']; ?>">
                            </div> -->

                            <a class="block_texts flex -space -center-y gap-m" href="<?php echo $presskit['presskit_file']['url']; ?>" >
                                <h3 class="h3 -bold">
                                    <?php echo $presskit['presskit_title']; ?>
                                    <p class="h3 -light"><?php echo $presskit['presskit_date']; ?></p>
                                </h3>
                                
                                <div class="flex gap-s -center-y btn -filled-picto">
                                    <span class="body -light"><?php echo human_filesize($presskit['presskit_file']['filesize'], 0); ?></span>
                                    <span class="picto"><?php get_template_part('Components/Svgs/Svg', 'Download'); ?></span>
                                </div>
                            </a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>