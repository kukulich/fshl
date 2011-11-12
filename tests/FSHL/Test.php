<?php

/**
 * FSHL 2.0.1                                  | Fast Syntax HighLighter |
 * -----------------------------------------------------------------------
 *
 * LICENSE
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

namespace FSHL;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Complete test.
 *
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license http://fshl.kukulich.cz/#license
 */
class Test extends \PHPUnit_Framework_TestCase
{
	/**
	 * Tests "No lexer" exception.
	 *
	 * @expectedException \RuntimeException
	 */
	public function testNoLexer()
	{
		$fshl = new Highlighter(new Output\Html());
		$fshl->highlight('');
	}

	/**
	 * Tests higlighting with HTML output and line counter.
	 */
	public function testHtmlCounter()
	{
		$fshl = new Highlighter(new Output\Html(), Highlighter::OPTION_TAB_INDENT | Highlighter::OPTION_LINE_COUNTER);
		$dir = realpath(__DIR__ . '/../data/html-counter');

		$this->execute($fshl, $dir);
	}

	/**
	 * Tests higlighting with HTML output.
	 */
	public function testHtml()
	{
		$fshl = new Highlighter(new Output\Html());
		$dir = realpath(__DIR__ . '/../data/html');

		$this->execute($fshl, $dir);
	}

	/**
	 * Tests higlighting with HTML manual output with line counter.
	 */
	public function testHtmlManualCounter()
	{
		$fshl = new Highlighter(new Output\HtmlManual(), Highlighter::OPTION_TAB_INDENT | Highlighter::OPTION_LINE_COUNTER);
		$dir = realpath(__DIR__ . '/../data/htmlmanual-counter');

		$this->execute($fshl, $dir);
	}

	/**
	 * Tests higlighting with HTML manual output.
	 */
	public function testHtmlManual()
	{
		$fshl = new Highlighter(new Output\Html());
		$dir = realpath(__DIR__ . '/../data/htmlmanual');

		$this->execute($fshl, $dir);
	}

	/**
	 * Executers tests.
	 *
	 * @param \FSHL\Highlighter $fshl
	 * @param string $dir
	 */
	private function execute(Highlighter $fshl, $dir)
	{
		$header = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /><link rel="stylesheet" type="text/css" href="../../../style.css" media="all" /></head><body><pre>' . "\n";
		$footer = "\n" . '</pre></body></html>';

		$iterator = new \FilesystemIterator($dir);
		foreach ($iterator as $file) {
			// Skip expected files
			if (false !== strpos($file->getFilename(), 'expected')) {
				continue;
			}

			$lexerClassName = '\\FSHL\\Lexer\\' . ucfirst(substr($file->getFilename(), 0, strpos($file->getFilename(), '.')));
			$highlighted = $fshl->highlight(file_get_contents($file->getPathName()), new $lexerClassName());

			$actual = tempnam(sys_get_temp_dir(), 'fshl');
			file_put_contents($actual, $header . $highlighted . $footer);

			$expected = substr($file->getPathName(), 0, strrpos($file->getPathName(), '.')) . '.expected.html';
			$this->assertFileEquals($expected, $actual);

			unlink($actual);
		}
	}
}
