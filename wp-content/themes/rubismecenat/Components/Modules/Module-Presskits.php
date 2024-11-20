<?php
$presskits = $args['presskits'];
?>


<section class="mod_presskits">

    <div class="mod_content">
        <?php if( $presskits ) : ?>

            <div class="flex">
                <?php foreach( $presskits as $presskit ) : ?>
                    <div class="">
                        <?php echo $presskit['presskit_title']; ?>
                        
                        <img src="<?php echo $presskit['presskit_cover']; ?>">

                        <a href="<?php echo $presskit['presskit_file']['url']; ?>">Consulter</a>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>