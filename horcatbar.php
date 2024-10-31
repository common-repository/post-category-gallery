<?php
/*
Plugin Name: Post Category Gallery
Plugin URI: http://www.fides-it.nl/post-category-gallery-plugin
Description: Displays selectable post categories in horizontal direction and selected featured images of posts below
Version: 1.0.0
Author: Fides
Author URI: http://fides-it.nl
*/

/*  Copyright 2014 Dennis Dam (dennis@fides-it.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define ("POSTCATEGORYGALLERY_VERSION", "1.0.0");

class HorCatBarWalker extends Walker_Category {

/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 2.1.0
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category Category data object.
	 * @param int    $depth    Depth of category in reference to parents. Default 0.
	 * @param array  $args     An array of arguments. @see wp_list_categories()
	 * @param int    $id       ID of the current category.
	 */
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$link = '<a class="'. (($category->cat_ID == intval($args['selected_category'])) ? 'current-cat':'').'" href="'.add_query_arg('hcbcategory', $category->cat_ID, get_permalink()).'" ';
		if ( $use_desc_for_title == 0 || empty($category->description) )
			$link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		$link .= '>';
		$link .= $cat_name;
		if ( !empty($show_count) ){
		    $link .= ' (' . intval($category->count) . ')';
		}
		$link .= '</a>';

		

		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}

}



/* load the PHP */
function sc_horcatbar($args, $content = null) {
	$list='';
	$defaults = array(
		'total_width' => '100%',
		'show_count' => 1,
		'exclude' => get_cat_ID( 'uncategorized' ),
		'show_option_none' => __('No categories!'),
		'title_li' => '',
		'echo' => 0,
		'walker' => new HorCatBarWalker(),
		'selected_category' => ($_GET['hcbcategory']) ? $_GET['hcbcategory'] : $args['default_category'],
		'thumbnail_size' => 'medium',
		'image_caption_position' => 'top',
		'color_scheme' => 'green',
		'caption_font_size' => '24px'
	);

	$r = wp_parse_args( $args, $defaults );
	$output = '<div class="hcb_container hcb_theme_'.$r['color_scheme'].'" style="width:'.$r['total_width'].'">';
	$output .= '<ul class="hcb_categories_top">'.wp_list_categories($r).'</ul>';
	
	$post_args = array( 'posts_per_page' => 999, 'category' => $r['selected_category']);
 	$postlist = get_posts($post_args);
	foreach ($postlist as $post) {
		if (has_post_thumbnail ($post->ID))
			$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $r['thumbnail_size'] );
		else
			$post_thumbnail = array(plugins_url('not_available.png', __FILE__), 300, 200);
		$image_width = $post_thumbnail[1];
		
   		$output .= '<div class="hcb_post_container" style="width:'.$image_width.'px;">';
		$post_url = esc_url( get_permalink($post->ID) );
		$caption = '<div class="caption" style="font-size:'.$r['caption_font_size'].'; width:'.$image_width.'px;"><a href="'.$post_url.'">'.$post->post_title.'</a></div>';
		if ($r['image_caption_position'] == 'top')
			$output .= $caption.'<br/>';
		$output .='<a href="'.$post_url.'"><img src="'. $post_thumbnail[0] .'"/></a>';
		if ($r['image_caption_position'] == 'bottom')
			$output .= $caption;
		$output .= '</div>';
	}
	return $output;
}


add_shortcode('postcategorygallery', 'sc_horcatbar');

function horcatbar_plugin_scripts(){
		
	wp_enqueue_style( 'horcatbar_style', plugins_url('horcatbar.css', __FILE__), array(), POSTCATEGORYGALLERY_VERSION );

}

add_action( 'wp_enqueue_scripts', 'horcatbar_plugin_scripts' );

?>