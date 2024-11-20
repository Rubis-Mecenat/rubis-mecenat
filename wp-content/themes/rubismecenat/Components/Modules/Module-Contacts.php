<?php
$title = $args['title'];
$contacts = $args['contacts'];
?>


<section class="mod_presskits">

    <div class="mod_content">
        <?php if( $contacts ) : ?>

            <div class="flex">
                <?php foreach( $contacts as $contact ) : ?>
                    <div class="">
                        <h3><?php echo $contact['contact_name']; ?></h3>
                        <h3><?php echo $contact['contact_fonction']; ?></h3>
                        <p><?php echo $contact['contact_details']; ?></p>
                        <p><?php echo $contact['contact_tel']; ?></p>
                        <p><?php echo $contact['contact_email']; ?></p>
                        <p><?php echo $contact['contact_linkedIn']; ?></p>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>