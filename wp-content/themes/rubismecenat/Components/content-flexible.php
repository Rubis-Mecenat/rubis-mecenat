<?php


$flex_content = 'flex-content';


if (have_rows( $flex_content )) :


    while (have_rows( $flex_content )) : the_row();

        /*
         * BLOCS de CONTENUS MIS EN AVANT 
         * (cf. Accueil)
         */
        if (get_row_layout() == 'mod_visual_text') :
            $visuel = get_sub_field('mod_visuel');
            $txt = get_sub_field('mod_txt');

            $args = array(
                'visuel'   => $visuel,
                'txt'   => $txt
            );

            get_template_part('Components/Modules/Module', 'VisuelText', $args);





        /*
         * CITATION (BIG TYPO) 
         * (cf. Accueil)
         */
        elseif (get_row_layout() == 'mod_quote') :
            $content = get_sub_field('mod_content');

            $args = array(
                'content'   => $content
            );

            get_template_part('Components/Modules/Module', 'Quote', $args);


        /*
         * CITATION (BIG TYPO) 
         * (cf. Accueil)
         */
        elseif (get_row_layout() == 'mod_visualgrid') :
            $visuals = get_sub_field('mod_visuals');

            $args = array(
                'visuals'   => $visuals
            );

            get_template_part('Components/Modules/Module', 'VisualGrid', $args);

            

            
        /*
         * ACTUALITES BIG
         * (cf. Accueil)
         */
        elseif (get_row_layout() == 'mod_news') :
            $publication = get_sub_field('mod_publication');
            $title = get_sub_field('mod_title');

            $args = array(
                'title'   => $title,
                'publication'   => $publication
            );

            get_template_part('Components/Modules/Module', 'News', $args);



        /*
         * LISTE DE POSTS 
         * (actualités, événements, etc.)
         */
        elseif (get_row_layout() == 'mod_carousel') :

            $title = get_sub_field('mod_title');
            $auto = get_sub_field('mod_auto');
            $postsperpage = get_sub_field('mod_postsperpage');
            $posttype = get_sub_field('mod_posttype');

            if( $auto ) {
                
                $q_args = array(
                    'posts_per_page'    => $postsperpage,
                    'post_type'         => $posttype,
                    'status'            => 'published',

                );

                if( $posttype === 'event' ) {
                    setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                    $today = date('Ymd');

                    $q_args['meta_key'] = 'date';
                    $q_args['orderby'] = 'meta_value_num';
                    $q_args['order'] = 'ASC';
                    $q_args['meta_query'] = array(
                        'key'           => 'date_fin',
                        'value'         => $today,
                        'compare'       => '>=',
                    );

                }
                else {
                    $q_args['orderby'] = 'date';
                    $q_args['order'] = 'DESC';
                }

                $relations = get_posts( $q_args );
            }
            else {
                $relations = get_sub_field('mod_relations');
            }

            $args = array(
                'title'   => $title,
                'relations'   => $relations
            );

            get_template_part('Components/Modules/Module', 'Carousel', $args);




        endif;


    endwhile;

endif;
