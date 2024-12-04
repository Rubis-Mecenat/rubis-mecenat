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
         * GRILLE DE VISUELS 
         * (cf. Projets)
         */
        elseif (get_row_layout() == 'mod_visualgrid') :
            $visuals = get_sub_field('mod_visuals');

            $args = array(
                'visuals'   => $visuals
            );

            get_template_part('Components/Modules/Module', 'VisualGrid', $args);

            

            
        /*
         * IDENTITE ARTIST 
         * (cf. Accueil)
         */
        elseif (get_row_layout() == 'mod_artist') :
            $artist = get_sub_field('mod_publication');

            $args = array(
                'artist'   => $artist
            );

            get_template_part('Components/Modules/Module', 'Artist', $args);



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
         * CAROUSEL DE PROJETS / PAGE / VIDEO / ACTU / ETC. 
         * (Page, projet, etc.)
         */
        elseif (get_row_layout() == 'mod_carousel') :

            $title = get_sub_field('mod_title');
            $bg = get_sub_field('mod_bg');
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
                'relations'   => $relations,
                'bg'   => $bg,
            );

            get_template_part('Components/Modules/Module', 'Carousel', $args);




        /*
         * CAROUSEL HORIZONTAL 
         * (Transmettre...)
         */
        elseif (get_row_layout() == 'mod_carousel_horizontal') :

            $title = get_sub_field('mod_title');
            $firstContent = get_sub_field('mod_firstContent');
            $relations = get_sub_field('mod_slides');

            $args = array(
                'title'   => $title,
                'firstContent'   => $firstContent,
                'relations'   => $relations
            );

            get_template_part('Components/Modules/Module', 'CarouselHorizontal', $args);




        /*
         * PROJETS MIS EN AVANT () 
         * (Projet NDAO)
         */
        elseif (get_row_layout() == 'mod_featuredProjects') :

            $title = get_sub_field('mod_title');
            $relations = get_sub_field('mod_relations');

            $args = array(
                'title'   => $title,
                'relations'   => $relations
            );

            get_template_part('Components/Modules/Module', 'FeaturedProjects', $args);




        /*
         * CONTENU SUR 2 COLONNES LIBRE
         * (cf. Créez et Accompagner)
         */
        elseif (get_row_layout() == 'mod_contentSplit') :

            $title = get_sub_field('mod_title');
            $medias = get_sub_field('mod_media');
            $content = get_sub_field('mod_content');
            $design = get_sub_field('mod_design');

            $args = array(
                'title'   => $title,
                'design'   => $design,
                'medias'   => $medias,
                'content'   => $content
            );

            get_template_part('Components/Modules/Module', 'ContentSplit', $args);


        /*
         * DOSSIERS DE PRESSE
         * (cf. Espace presse)
         */
        elseif (get_row_layout() == 'mod_presskits') :

            $presskits = get_sub_field('presskits');

            $args = array(
                'presskits'   => $presskits
            );

            get_template_part('Components/Modules/Module', 'Presskits', $args);




        /*
         * EQUIPE / CONTACTS
         * (cf. Le Fonds / Espace Presse)
         */
        elseif (get_row_layout() == 'mod_contacts') :

            $title = get_sub_field('mod_title');
            $contacts = get_sub_field('mod_contacts');

            $args = array(
                'title'   => $title,
                'contacts'   => $contacts
            );

            get_template_part('Components/Modules/Module', 'Contacts', $args);


        /*
         * EQUIPE / CONTACTS
         * (cf. Le Fonds / Espace Presse)
         */
        elseif (get_row_layout() == 'mod_instafeed') :

            $id = get_sub_field('mod_feedId');
            $account = get_sub_field('mod_account');
            $hashtag = get_sub_field('mod_hashtag');
            $bg = get_sub_field('mod_bg');

            $args = array(
                'id'   => $id,
                'account'   => $account,
                'hashtag'   => $hashtag,
                'bg'   => $bg,
            );

            get_template_part('Components/Modules/Module', 'Instafeed', $args);




        endif;


    endwhile;

endif;
