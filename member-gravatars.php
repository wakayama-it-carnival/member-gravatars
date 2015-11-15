<?php
/*
Plugin Name: Member Gravatars
Version: 0.1-alpha
Author: Takayuki Miyauchi
Author URI: http://wakayama-it-carnival.org/
*/


add_shortcode( 'gravatars', function( $atts, $content ){
	$atts = shortcode_atts( array(
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	), $atts, 'gravatars' );

	$users = get_users( array(
		'orderby'      => $atts['orderby'],
		'order'        => $atts['order'],
		'who'          => $atts['who'],
	) );

	$html = '<div class="row member-gravatars">';
	foreach ( $users as $u ) {
		$html .= '<div class="col-xs-6 col-sm-3 gravatars" style="text-align: center; margin-bottom: 20px;">';
		$html .= get_avatar( $u ->ID );
		$html .= '<br>';
		if ( $u->user_url ) {
			$html .= '<a href="' . esc_url( $u->user_url ) . '">';
			$html .= esc_html( $u->display_name );
			$html .= '</a>';
		} else {
			$html .= esc_html( $u->display_name );
		}
		$html .= '</div>';
	}
	$html .= '</div>';

	return $html;
} );
