<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rubismecenat
 */

if ( ! function_exists( 'rubismecenat_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function rubismecenat_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'rubismecenat' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'rubismecenat_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function rubismecenat_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'rubismecenat' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'rubismecenat_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function rubismecenat_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'rubismecenat' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'rubismecenat' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'rubismecenat' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'rubismecenat' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'rubismecenat' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'rubismecenat' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'rubismecenat_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function rubismecenat_post_thumbnail( $id, $size = 'theme_large' ) {
		$thumbnail_id = get_post_thumbnail_id($id);
		$caption = get_the_post_thumbnail_caption( $id );
		$caption = $caption !== '' && strlen($caption) > 70 ? substr($caption, 0, 70) . '...' : $caption;

		$title = get_the_title( $thumbnail_id ); 
		$alt = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>

			<div class="post-thumbnail is-relative">
				<div class="">
					<?php echo get_the_post_thumbnail($id, $size); ?>
				</div>
				<div class="thumbnail_captions flex -space on-desktop">
					<p class="credit"><?php echo $caption; ?></p>
					<p class="caption"><?php echo $alt; ?></p>
				</div>
			</div><!-- .post-thumbnail -->

	<?php }
endif;


if ( ! function_exists( 'rubismecenat_attachment' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function rubismecenat_attachment( $attachment, $classes = array(), $size = 'theme_medium' ) {
		$alt = get_post_meta ( $attachment['ID'], '_wp_attachment_image_alt', true );
		$title = get_the_title ( $attachment['ID'] );
		$caption = wp_get_attachment_caption ( $attachment['ID']);
		$caption = $caption !== '' && strlen($caption) > 70 ? substr($caption, 0, 70) . '...' : $caption;

		?>
                <figure class="is-relative <?php echo isset($classes['figure_class']) ? $classes['figure_class'] : ''; ?>">
                    <img src="<?php echo $attachment['sizes'][$size]; ?>" class=" <?php echo isset($classes['img_class']) ? $classes['img_class'] : ''; ?>">
                    <div class="thumbnail_captions flex -space">
                        <p class="credit"><?php echo $caption; ?></p>
                        <p class="caption"><?php echo $alt; ?></p>
                    </div>
                </figure>

	<?php }
endif;


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;



if ( ! function_exists( 'list_terms_custom_taxonomy' ) ) :
	/**
	 * Displays FIlters for an archive page.
	 *
	 */
	function list_terms_custom_taxonomy( $atts ) {
					
		$terms = get_terms( array(
			'taxonomy'   =>  $atts['tax'],
			'hide_empty' => false,
		) );

		if ( !empty($terms) ) :
			$output = '<nav class="filters flex gap-s -start-y mb-l">';
				
				$output.= '<button class="btn -filter -active js-filter-content" data-posttype="' . $atts['posttype'] . '" data-tax="' . $atts['tax'] . '" data-term="">' . pll__('Tous les contenus') . '</button>';

				foreach( $terms as $term ) {
					$output.= '<button class="btn -filter js-filter-content" data-posttype="' . $atts['posttype'] . '" data-tax="' . $atts['tax'] . '" data-term="' . $term->slug . '">' . esc_attr( $term->name ) . '</button>';
				}
			$output .= '</nav>';

			echo $output;
		endif;
	}
						
endif;



if ( ! function_exists( 'list_post_type' ) ) :
	/**
	 * Displays Filters for an archive page.
	 *
	 */
	function list_post_type( ) {

		$posttypes = getPostTypesArray();

			$output = '<nav class="filters flex gap-s -start-y mb-l">';
			
				$output.= '<button class="btn -filter -active js-filter-content" data-posttype="all">' . pll__('Tous les contenus') . '</button>';

				foreach( $posttypes as $slug => $label ) {
					$output.= '<button class="btn -filter js-filter-content" data-posttype="' . $slug . '">' . esc_attr( $label ) . '</button>';
				}

			$output .= '</nav>';

			echo $output;
	}
						
endif;


function pagination_bar($query) {
 
	$big = 9999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $query->max_num_pages,
		'prev_text'	=> '<',
		'next_text' => '>',
		'mid_size' => 1
	) );
}