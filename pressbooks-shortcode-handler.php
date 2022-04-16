<?php

/*
Plugin Name: Pressbooks Shortcode Handler
Plugin URI: https://github.com/SteelWagstaff/pressbooks-shortcode-handler
Description: Plugin for Pressbooks to handle additional shortcodes used by Lumen Learning.
Version: 0.1.1
Author: Steel Wagstaff
Author URI: https://steelwagstaff.info
License: GPL 3.0
*/

add_shortcode( 'reveal-answer', 'revealAnswerShortCodeHandler' );
add_shortcode( 'hidden-answer', 'hiddenAnswerShortCodeHandler' );
add_shortcode( 'glossary-page', 'glossary_page_shortcode' );
add_shortcode( 'glossary-term', 'glossary_term_shortcode' );
add_shortcode( 'glossary-definition', 'glossary_definition_shortcode' );

/**
 * Shortcode handler for [reveal-answer].
 * Ex: [reveal-answer q="153"]Show Answer[/reveal-answer].
 * @param array $atts Used by Lumen but not needed here.
 * @param string $content Shortcode content.
 *
 * @return string
 */
function revealAnswerShortCodeHandler( $atts = [], $content = null ) {
    return '<details><summary>' . do_shortcode( $content ) . '</summary>';
}

/**
 * Shortcode handler for [hidden-answer]
 * Ex: [hidden-answer a="153"]Show Answer[/hidden-answer].
 * @param array $atts Used by Lumen but not needed here.
 * @param string $content Shortcode content.
 *
 * @return string
 */

function hiddenAnswerShortCodeHandler( $atts = [], $content = null ) {
    return do_shortcode( $content ) . '</details>';
}

/**
 * Shortcode that adds a glossary page wrapper element.
 * Ex: [glossary-page][/glossary-page].
 *
 * @param string $content Shortcode content.
 *
 * @return string
 */
function glossary_page_shortcode( $atts = [], $content = null ) {
    return '<div class="lumen-glossary"><dl>' . do_shortcode( $content ) . '</dl></div>';
}

/**
 * Shortcode that adds a glossary term (used by 'glossary-entry' shortcode)
 * Ex: [glossary-term]Batman[/glossary-term].
 *
 * @param string $content Shortcode content.
 *
 * @return string
 */
function glossary_term_shortcode( $atts = [], $content = null ) {
    return '<dt>' . do_shortcode( $content ) . '</dt>';
}

/**
 * Shortcode that adds a glossary definition (used by 'glossary-entry' shortcode)
 * Ex: [glossary-definition]I am the night[/glossary-definition].
 * @param string $content Shortcode content.
 *
 * @return string
 */
function glossary_definition_shortcode( $atts = [], $content = null ) {
    return '<dd>' . do_shortcode( $content ) . '</dd>';
}
