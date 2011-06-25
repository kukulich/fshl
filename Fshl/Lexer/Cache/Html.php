<?php

/**
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------
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
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

/**
 * Optimized and cached Html lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lexer
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 * @see Fshl_Generator
 * @see Fshl_Lexer_Html
 */
class Fshl_Lexer_Cache_Html
{
	/**
	 * Generator version/lexer version.
	 *
	 * @var string
	 */
	public $version;

	/**
	 * Transitions table.
	 *
	 * @var array
	 */
	public $trans;

	/**
	 * Id of initial state.
	 *
	 * @var integer
	 */
	public $initialState;

	/**
	 * Id of return state.
	 *
	 * @var integer
	 */
	public $returnState;

	/**
	 * Id of quit state.
	 *
	 * @var integer
	 */
	public $quitState;

	/**
	 * List of flags for all states.
	 *
	 * @var array
	 */
	public $flags;

	/**
	 * Data for all states.
	 *
	 * @var array
	 */
	public $data;

	/**
	 * List of CSS classes.
	 *
	 * @var array
	 */
	public $classes;

	/**
	 * List of keywords.
	 *
	 * @var array
	 */
	public $keywords;

	/**
	 * Initializes lexer.
	 */
	public function __construct()
	{
		$this->version = '0.4.11/1.11';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 10, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 0
				), 3 => array(
					0 => 2, 1 => 0
				), 4 => array(
					0 => 1, 1 => 0
				), 5 => array(
					0 => 0, 1 => 0
				)
			), 1 => array(
				0 => array(
					0 => 0, 1 => 1
				), 1 => array(
					0 => 0, 1 => 1
				), 2 => array(
					0 => 0, 1 => 1
				)
			), 2 => array(
				0 => array(
					0 => 0, 1 => 1
				), 1 => array(
					0 => 3, 1 => 0
				), 2 => array(
					0 => 4, 1 => 1
				), 3 => array(
					0 => 4, 1 => 1
				), 4 => array(
					0 => 6, 1 => 1
				), 5 => array(
					0 => 6, 1 => 1
				), 6 => array(
					0 => 11, 1 => 0
				), 7 => array(
					0 => 11, 1 => 0
				)
			), 3 => array(
				0 => array(
					0 => 8, 1 => 0
				), 1 => array(
					0 => 12, 1 => 1
				), 2 => array(
					0 => 9, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				), 4 => array(
					0 => 11, 1 => 0
				), 5 => array(
					0 => 3, 1 => 0
				)
			), 4 => array(
				0 => array(
					0 => 8, 1 => 0
				), 1 => array(
					0 => 9, 1 => 0
				), 2 => array(
					0 => 5, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				), 4 => array(
					0 => 11, 1 => 0
				), 5 => array(
					0 => 3, 1 => 0
				)
			), 5 => array(
				0 => array(
					0 => 12, 1 => 1
				)
			), 6 => array(
				0 => array(
					0 => 8, 1 => 0
				), 1 => array(
					0 => 9, 1 => 0
				), 2 => array(
					0 => 7, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				), 4 => array(
					0 => 11, 1 => 0
				), 5 => array(
					0 => 3, 1 => 0
				)
			), 7 => array(
				0 => array(
					0 => 12, 1 => 1
				)
			), 8 => array(
				0 => array(
					0 => 12, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 0
				), 3 => array(
					0 => 8, 1 => 0
				)
			), 9 => array(
				0 => array(
					0 => 12, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 0
				), 3 => array(
					0 => 9, 1 => 0
				)
			), 10 => array(
				0 => array(
					0 => 0, 1 => 1
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 0
				), 3 => array(
					0 => 10, 1 => 0
				)
			), 11 => NULL
		);
		$this->initialState = 0;
		$this->returnState = 12;
		$this->quitState = 13;
		$this->flags = array(
			0 => 0, 1 => 0, 2 => 0, 3 => 4, 4 => 4, 5 => 8, 6 => 4, 7 => 8, 8 => 4, 9 => 4, 10 => 0, 11 => 8
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => 'CSS', 6 => NULL, 7 => 'JS', 8 => NULL, 9 => NULL, 10 => NULL, 11 => 'PHP'
		);
		$this->classes = array(
			0 => NULL, 1 => 'html-entity', 2 => 'html-tag', 3 => 'html-tagin', 4 => 'html-tagin', 5 => 'html-tag', 6 => 'html-tagin', 7 => 'html-tag', 8 => 'html-quote', 9 => 'html-quote', 10 => 'html-comment', 11 => 'xlang'
		);
		$this->keywords = array(
			
		);

	}

	/**
	 * Parses state OUT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart0(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ($textPos === strpos($text, '<!--', $textPos)) {
				return array(0, '<!--', 4, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(1, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(2, '<?', 2, $buffer, $textPos - $start);
			}
			if ('<' === $letter) {
				return array(3, '<', 1, $buffer, $textPos - $start);
			}
			if ('&' === $letter) {
				return array(4, '&', 1, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(5, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state ENTITY.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart1(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if (';' === $letter) {
				return array(0, ';', 1, $buffer, $textPos - $start);
			}
			if ('&' === $letter) {
				return array(1, '&', 1, $buffer, $textPos - $start);
			}
			if (preg_match('~^\\s$~', $letter)) {
				return array(2, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state TAG.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart2(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('>' === $letter) {
				return array(0, '>', 1, $buffer, $textPos - $start);
			}
			if (preg_match('~^\\s$~', $letter)) {
				return array(1, $letter, 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, 'style', $textPos)) {
				return array(2, 'style', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, 'STYLE', $textPos)) {
				return array(3, 'STYLE', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, 'script', $textPos)) {
				return array(4, 'script', 6, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, 'SCRIPT', $textPos)) {
				return array(5, 'SCRIPT', 6, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(6, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(7, '<?', 2, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state inTAG.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart3(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('"' === $letter) {
				return array(0, '"', 1, $buffer, $textPos - $start);
			}
			if ('>' === $letter) {
				return array(1, '>', 1, $buffer, $textPos - $start);
			}
			if ('\'' === $letter) {
				return array(2, '\'', 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(3, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(4, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(5, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state CSS.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart4(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('"' === $letter) {
				return array(0, '"', 1, $buffer, $textPos - $start);
			}
			if ('\'' === $letter) {
				return array(1, '\'', 1, $buffer, $textPos - $start);
			}
			if ('>' === $letter) {
				return array(2, '>', 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(3, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(4, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(5, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state TO_CSS.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart5(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('>' === $letter) {
				return array(0, '>', 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state JAVASCRIPT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart6(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('"' === $letter) {
				return array(0, '"', 1, $buffer, $textPos - $start);
			}
			if ('\'' === $letter) {
				return array(1, '\'', 1, $buffer, $textPos - $start);
			}
			if ('>' === $letter) {
				return array(2, '>', 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(3, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(4, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(5, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state TO_JAVASCRIPT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart7(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('>' === $letter) {
				return array(0, '>', 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state QUOTE1.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart8(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('"' === $letter) {
				return array(0, '"', 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(1, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(2, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state QUOTE2.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart9(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('\'' === $letter) {
				return array(0, '\'', 1, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(1, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(2, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state COMMENT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart10(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ($textPos === strpos($text, '-->', $textPos)) {
				return array(0, '-->', 3, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(1, '<?php', 5, $buffer, $textPos - $start);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(2, '<?', 2, $buffer, $textPos - $start);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, 1, $buffer, $textPos - $start);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

}