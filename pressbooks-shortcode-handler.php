<?php

/*
Plugin Name: Pressbooks Shortcode Handler
Plugin URI: https://github.com/pressbooks/pressbooks-shortcode-handler
Description: Plugin for Pressbooks to handle additional shortcodes used by Lumen Learning.
Version: 1.1.0
Author: Pressbooks (Book Oven Inc.)
Author URI: https://pressbooks.org
Text Domain: pressbooks-shortcode-handler
License: GPL v3 or later
*/

add_shortcode( 'reveal-answer', 'revealAnswerShortCodeHandler' );
add_shortcode( 'hidden-answer', 'hiddenAnswerShortCodeHandler' );
add_shortcode( 'glossary-page', 'glossaryPageShortcodeHandler' );
add_shortcode( 'glossary-term', 'glossaryTermShortcodeHandler' );
add_shortcode( 'glossary-definition', 'glossaryDefinitionShortcodeHandler' );
add_shortcode( 'videopicker', 'videopickerShortcodeHandler' );
add_shortcode( 'ohm', 'ohmQuestionShortcodeHandler' );
add_shortcode( 'ohm2_question', 'ohmQuestionShortcodeHandler' );
add_shortcode( 'choosedataset', 'choosedatasetShortcodeHandler' );

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
function glossaryPageShortcodeHandler( $atts = [], $content = null ) {
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
function glossaryTermShortcodeHandler( $atts = [], $content = null ) {
	return '<dt>' . do_shortcode( $content ) . '</dt>';
}

/**
 * Shortcode that adds a glossary definition (used by 'glossary-entry' shortcode)
 * Ex: [glossary-definition]I am the night[/glossary-definition].
 * @param string $content Shortcode content.
 *
 * @return string
 */
function glossaryDefinitionShortcodeHandler( $atts = [], $content = null ) {
	return '<dd>' . do_shortcode( $content ) . '</dd>';
}

/**
 * Shortcode that displays a fallback message for excluded interactive video picker elements used by Lumen Learning
 * @param string $content Shortcode content.
 *
 * @return string
 */
function videopickerShortcodeHandler( $atts = [], $content = null ) {
	return '<div class="textbox interactive-content">
	<p><span class="interactive-content__icon"></span>An interactive video picker element has been excluded from the printed version of the text. To see the interactive element that was excluded, please visit the courseware online.</p>
	</div>';
}

/**
 * Shortcode that displays the title, label, and brief fallback message for excluded interactive dataset picker elements
 * @param string $content Shortcode content.
 *
 * @return string
 */
function choosedatasetShortcodeHandler( $atts = [], $content = null ) {
	$header = '';
	if ( $atts['title'] ) {
		$header .= '<h3>' . $atts['title'] . '</h3>';
	}
	if ( $atts['label'] ) {
		$header .= '<h4>' . $atts['label'] . '</h4>';
	}
	$options = '';
	if ( $atts['default'] ) {
		$options .= '<option value="">' . $atts['default'] . '</option>';
	}
	$id = $atts['divid'] ? $atts['divid'] : 'tnh-choose-dataset';

	return '<div id="' . $id . '" class="chooseDataset">
            ' . $header . '
            <div class="textbox interactive-content">
	<p><span class="interactive-content__icon"></span>An interactive dataset picker element has been excluded from the printed version of the text. To see the interactive element that was excluded, please visit the courseware online.</p>
	</div></div>';
}

/**
 * Shortcode that displays a brief fallback message for excluded OHM & OHM 2 questions used by Lumen Learning
 * @param string $content Shortcode content.
 *
 * @return string
 */
function ohmQuestionShortcodeHandler( $atts = [], $content = null ) {
	return '<div class="textbox interactive-content">
	<p><span class="interactive-content__icon"></span>An interactive online homework element has been excluded from the printed version of the text. To see the interactive element that was excluded, please visit the courseware online.</p>
	</div>';
}
