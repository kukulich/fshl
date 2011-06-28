<?php

/**
 * FSHL 2.0 RC                            | Universal Syntax HighLighter |
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
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

namespace FSHL\Lexer\Cache;

/**
 * Optimized and cached Css lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 * @see \FSHL\Generator
 * @see \FSHL\Lexer\Css
 */
class Css
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
	 * Id of the initial state.
	 *
	 * @var integer
	 */
	public $initialState;

	/**
	 * Id of the return state.
	 *
	 * @var integer
	 */
	public $returnState;

	/**
	 * Id of the quit state.
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
	 * Initializes the lexer.
	 */
	public function __construct()
	{
		$this->version = '2.0/2.0';
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
				), 7 => array(
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
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => 'Php', 9 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => 'css-class', 2 => '', 3 => 'css-property', 4 => 'css-value', 5 => 'css-color', 6 => 'css-comment', 7 => 'xlang', 9 => 'html-tag'
		);
		$this->keywords = array(
			
		);

	}

	/**
	 * Finds a delimiter for state OUT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter0(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}
			if ('{' === $letter) {
				return array(1, '{', $buffer);
			}
			if ('.' === $letter) {
				return array(2, '.', $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(3, '/*', $buffer);
			}
			if (0 === strpos($part, '</')) {
				return array(4, '</', $buffer);
			}
			if (0 === strpos($part, '<?php')) {
				return array(5, '<?php', $buffer);
			}
			if (0 === strpos($part, '<?=')) {
				return array(6, '<?=', $buffer);
			}
			if (0 === strpos($part, '<?')) {
				return array(7, '<?', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state CLASS.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter1(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(1, '/*', $buffer);
			}
			if ('{' === $letter) {
				return array(2, '{', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state DEF.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter2(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if (':' === $letter) {
				return array(0, ':', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(1, $letter, $buffer);
			}
			if (';' === $letter) {
				return array(2, ';', $buffer);
			}
			if ('}' === $letter) {
				return array(3, '}', $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(4, '/*', $buffer);
			}
			if (preg_match('~^[-a-z]+~i', $part, $matches)) {
				return array(5, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state PROPERTY.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter3(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}
			if (':' === $letter) {
				return array(1, ':', $buffer);
			}
			if ('}' === $letter) {
				return array(2, '}', $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(3, '/*', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state VALUE.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter4(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if (';' === $letter) {
				return array(0, ';', $buffer);
			}
			if ('#' === $letter) {
				return array(1, '#', $buffer);
			}
			if ('}' === $letter) {
				return array(2, '}', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(4, '/*', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state COLOR.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter5(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if (preg_match('~^[^a-f\\d]+~i', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state COMMENT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter6(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}
			if (0 === strpos($part, '*/')) {
				return array(1, '*/', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}