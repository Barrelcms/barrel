<?php

use Lablog\Markdown\Parsedown\ParsedownMarkdown;

class ParsedownMarkdownTest extends TestCase {

    public function setUp()
    {
        $this->parsedown = new ParsedownMarkdown;

        $this->markdownFile = $this->tmpStorage.'ParsedownMarkdownTestMarkdown.md';
        file_put_contents($this->markdownFile, 'Hello World.');
    }

    public function tearDown()
    {
        unlink($this->markdownFile);
        unset($this->parsedown);
        unset($this->markdownFile);
    }

    public function testIsInstanceOfMarkdownInterface()
    {
        $this->assertInstanceOf('Lablog\Markdown\MarkdownInterface', $this->parsedown);
    }

    public function testBasicMarkdownConversionUsingString()
    {
        $string = 'Hello World.';
        $expected = '<p>Hello World.</p>';
        $actual = $this->parsedown->convertString($string);

        $this->assertEquals($expected, $actual);
    }

    public function testBasicMarkdownConversionUsingFile()
    {
        $expected = '<p>Hello World.</p>';
        $actual = $this->parsedown->convertFile($this->markdownFile);

        $this->assertEquals($expected, $actual);
    }

}