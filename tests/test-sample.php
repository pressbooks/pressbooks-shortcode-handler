<?php

class SampleTest extends \WP_UnitTestCase
{
    public function test_shortcodes_are_registered()
    {
        global $shortcode_tags;
        $this->assertArrayHasKey('reveal-answer', $shortcode_tags);
        $this->assertArrayHasKey('hidden-answer', $shortcode_tags);
        $this->assertArrayHasKey('glossary-page', $shortcode_tags);
    }

    public function test_reveal_answer_handler()
    {
        $html = revealAnswerShortCodeHandler([], 'Answer');
        $this->assertStringContainsString('<details><summary>', $html);
        $this->assertStringContainsString('Answer', $html);
    }

    public function test_hidden_answer_handler()
    {
        $html = hiddenAnswerShortCodeHandler([], 'Answer');
        $this->assertStringContainsString('</details>', $html);
    }
}
