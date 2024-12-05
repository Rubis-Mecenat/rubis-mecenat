<?php
$title = $args['title'];
$contacts = $args['contacts'];
?>


<section class="mod_contacts">

    <div class="mod_title txt-center mb-xxl">
        <h2><?php echo $title; ?></h2>
    </div>

    <div class="mod_content wrapper">
        <?php if( $contacts ) : ?>

            <div class="grid">
                <?php foreach( $contacts as $key => $contact ) : ?>

                    <?php if($key % 2 === 1) : ?>
                        <div class="s-12col m-2col"></div>
                    <?php endif; ?>

                    <div class="s-12col m-5col">

                        <h3 class="flex -column mb-m">
                            <span class="h4"><?php echo $contact['contact_name']; ?></span>
                            <span class="h3 -regular"><?php echo $contact['contact_fonction']; ?></span>
                        </h3>

                        <div class="body mb-l">
                            <?php echo $contact['contact_details']; ?></div>

                        <div class="contact-methods">
                            <p class="flex -center-y gap-s mb-m btn -filled-picto">
                                <span class="picto -small"><?php get_template_part('Components/Svgs/Svg', 'Phone'); ?></span>
                                <?php echo $contact['contact_tel']; ?>
                            </p>

                            <a href="mailto:<?php echo $contact['contact_email']; ?>" class="body flex -center-y gap-s mb-m btn -filled-picto">
                                <span class="picto -small"><?php get_template_part('Components/Svgs/Svg', 'Email'); ?></span>
                                <?php echo $contact['contact_email']; ?>
                            </a>

                            <a href="https://<?php echo $contact['contact_linkedIn']; ?>" class="body flex -center-y gap-s mb-m btn -filled-picto">
                                <span class="picto -small"><?php get_template_part('Components/Svgs/Svg', 'Linkedin'); ?></span>
                                <?php echo $contact['contact_linkedIn']; ?>
                            </a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>