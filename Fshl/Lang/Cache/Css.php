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
 * Cache file for language Css.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lang
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 * @see Fshl_Generator
 * @see Fshl_Lang_Css
 */
class Fshl_Lang_Cache_Css
{
	/**
	 * Generator version/language version.
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
	 * Initializes language.
	 */
	public function __construct()
	{
		$this->version = '0.4.11/1.12';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 0, 1 => 0
				), 1 => array(
					0 => 2, 1 => 0
				), 2 => array(
					0 => 1, 1 => 0
				), 3 => array(
					0 => 6, 1 => 0
				), 4 => array(
					0 => 9, 1 => 0
				), 5 => array(
					0 => 7, 1 => 0
				), 6 => array(
					0 => 7, 1 => 0
				)
			), 1 => array(
				0 => array(
					0 => 8, 1 => 1
				), 1 => array(
					0 => 6, 1 => 0
				), 2 => array(
					0 => 8, 1 => 1
				)
			), 2 => array(
				0 => array(
					0 => 4, 1 => 1
				), 1 => array(
					0 => 2, 1 => 0
				), 2 => array(
					0 => 2, 1 => 1
				), 3 => array(
					0 => 8, 1 => 0
				), 4 => array(
					0 => 6, 1 => 0
				), 5 => array(
					0 => 3, 1 => 0
				)
			), 3 => array(
				0 => array(
					0 => 3, 1 => 0
				), 1 => array(
					0 => 8, 1 => 1
				), 2 => array(
					0 => 8, 1 => 1
				), 3 => array(
					0 => 6, 1 => 0
				)
			), 4 => array(
				0 => array(
					0 => 8, 1 => 1
				), 1 => array(
					0 => 5, 1 => 0
				), 2 => array(
					0 => 8, 1 => 1
				), 3 => array(
					0 => 4, 1 => 0
				), 4 => array(
					0 => 6, 1 => 0
				)
			), 5 => array(
				0 => array(
					0 => 8, 1 => 1
				)
			), 6 => array(
				0 => array(
					0 => 6, 1 => 0
				), 1 => array(
					0 => 8, 1 => 0
				)
			), 7 => NULL, 9 => NULL
		);
		$this->initialState = 0;
		$this->returnState = 8;
		$this->quitState = 9;
		$this->flags = array(
			0 => 0, 1 => 4, 2 => 4, 3 => 4, 4 => 4, 5 => 4, 6 => 4, 7 => 8, 9 => 8
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => 'PHP', 9 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => 'css-class', 2 => '', 3 => 'css-property', 4 => 'css-value', 5 => 'css-color', 6 => 'css-comment', 7 => 'xlang', 9 => 'html-tag'
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
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
			}
			if ('{' === $letter) {
				return array(1, '{', $textPos - $start, $buffer, 1);
			}
			if ('.' === $letter) {
				return array(2, '.', $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(3, '/*', $textPos - $start, $buffer, 2);
			}
			if ($textPos === strpos($text, '</', $textPos)) {
				return array(4, '</', $textPos - $start, $buffer, 2);
			}
			if ($textPos === strpos($text, '<?php', $textPos)) {
				return array(5, '<?php', $textPos - $start, $buffer, 5);
			}
			if ($textPos === strpos($text, '<?', $textPos)) {
				return array(6, '<?', $textPos - $start, $buffer, 2);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state CLASS.
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
			if (ctype_space($letter)) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(1, '/*', $textPos - $start, $buffer, 2);
			}
			if ('{' === $letter) {
				return array(2, '{', $textPos - $start, $buffer, 1);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state DEF.
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
			if (':' === $letter) {
				return array(0, ':', $textPos - $start, $buffer, 1);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(1, $letter, $textPos - $start, $buffer, 1);
			}
			if (';' === $letter) {
				return array(2, ';', $textPos - $start, $buffer, 1);
			}
			if ('}' === $letter) {
				return array(3, '}', $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(4, '/*', $textPos - $start, $buffer, 2);
			}
			if (!ctype_space($letter)) {
				return array(5, $letter, $textPos - $start, $buffer, 1);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state PROPERTY.
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
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
			}
			if (':' === $letter) {
				return array(1, ':', $textPos - $start, $buffer, 1);
			}
			if ('}' === $letter) {
				return array(2, '}', $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(3, '/*', $textPos - $start, $buffer, 2);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state VALUE.
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
			if (';' === $letter) {
				return array(0, ';', $textPos - $start, $buffer, 1);
			}
			if ('#' === $letter) {
				return array(1, '#', $textPos - $start, $buffer, 1);
			}
			if ('}' === $letter) {
				return array(2, '}', $textPos - $start, $buffer, 1);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(4, '/*', $textPos - $start, $buffer, 2);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

	/**
	 * Parses state COLOR.
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
			if (!ctype_xdigit($letter)) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
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
	public function getPart6(&$text, $textLength, $textPos)
	{
		$buffer = false;
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
			}
			if ($textPos === strpos($text, '*/', $textPos)) {
				return array(1, '*/', $textPos - $start, $buffer, 2);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

}