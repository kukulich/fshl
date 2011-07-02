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
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 9, 1 => 1
				), 1 => array(
					0 => 2, 1 => 1
				), 2 => array(
					0 => 2, 1 => 1
				), 3 => array(
					0 => 3, 1 => 1
				), 4 => array(
					0 => 4, 1 => 1
				), 5 => array(
					0 => 6, 1 => 1
				), 6 => array(
					0 => 11, 1 => 1
				), 7 => array(
					0 => 1, 1 => 1
				), 8 => array(
					0 => 0, 1 => 1
				), 9 => array(
					0 => 0, 1 => 1
				), 10 => array(
					0 => 14, 1 => 1
				), 11 => array(
					0 => 12, 1 => 1
				), 12 => array(
					0 => 12, 1 => 1
				), 13 => array(
					0 => 12, 1 => 1
				)
			), 1 => array(
				0 => array(
					0 => 13, 1 => -1
				), 1 => array(
					0 => 11, 1 => 1
				)
			), 2 => array(
				0 => array(
					0 => 13, 1 => 1
				), 1 => array(
					0 => 13, 1 => -1
				), 2 => array(
					0 => 13, 1 => -1
				), 3 => array(
					0 => 5, 1 => 1
				), 4 => array(
					0 => 11, 1 => 1
				)
			), 3 => array(
				0 => array(
					0 => 13, 1 => -1
				), 1 => array(
					0 => 13, 1 => -1
				), 2 => array(
					0 => 13, 1 => -1
				), 3 => array(
					0 => 5, 1 => 1
				), 4 => array(
					0 => 11, 1 => 1
				)
			), 4 => array(
				0 => array(
					0 => 13, 1 => -1
				), 1 => array(
					0 => 13, 1 => -1
				), 2 => array(
					0 => 13, 1 => -1
				), 3 => array(
					0 => 5, 1 => 1
				), 4 => array(
					0 => 11, 1 => 1
				)
			), 5 => array(
				0 => array(
					0 => 13, 1 => -1
				), 1 => array(
					0 => 13, 1 => -1
				)
			), 6 => array(
				0 => array(
					0 => 7, 1 => 1
				), 1 => array(
					0 => 8, 1 => 0
				), 2 => array(
					0 => 6, 1 => 0
				), 3 => array(
					0 => 6, 1 => 1
				), 4 => array(
					0 => 6, 1 => 1
				), 5 => array(
					0 => 13, 1 => 0
				), 6 => array(
					0 => 11, 1 => 1
				)
			), 7 => array(
				0 => array(
					0 => 13, 1 => -1
				), 1 => array(
					0 => 13, 1 => -1
				), 2 => array(
					0 => 7, 1 => 1
				), 3 => array(
					0 => 7, 1 => 1
				), 4 => array(
					0 => 11, 1 => 1
				)
			), 8 => array(
				0 => array(
					0 => 10, 1 => 1
				), 1 => array(
					0 => 13, 1 => -1
				), 2 => array(
					0 => 9, 1 => 1
				), 3 => array(
					0 => 13, 1 => -1
				), 4 => array(
					0 => 13, 1 => -1
				), 5 => array(
					0 => 8, 1 => 1
				), 6 => array(
					0 => 8, 1 => 1
				), 7 => array(
					0 => 11, 1 => 1
				)
			), 9 => array(
				0 => array(
					0 => 13, 1 => 0
				), 1 => array(
					0 => 8, 1 => 1
				)
			), 10 => array(
				0 => array(
					0 => 13, 1 => -1
				)
			), 11 => array(
				0 => array(
					0 => 11, 1 => 1
				), 1 => array(
					0 => 11, 1 => 1
				), 2 => array(
					0 => 13, 1 => 0
				)
			), 12 => NULL, 14 => NULL
		);
		$this->initialState = 0;
		$this->returnState = 13;
		$this->quitState = 14;
		$this->flags = array(
			0 => 0, 1 => 4, 2 => 4, 3 => 4, 4 => 4, 5 => 4, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 4, 11 => 4, 12 => 8, 14 => 8
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => NULL, 8 => NULL, 9 => NULL, 10 => NULL, 11 => NULL, 12 => 'Php', 14 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => 'css-at-rule', 2 => 'css-tag', 3 => 'css-id', 4 => 'css-class', 5 => 'css-pseudo', 6 => NULL, 7 => 'css-property', 8 => 'css-value', 9 => 'css-func', 10 => 'css-color', 11 => 'css-comment', 12 => 'xlang', 14 => 'html-tag'
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
	public function findDelimiter0($text, $textLength, $textPos)
	{
		static $delimiters = array(
			2 => '*', 3 => '#', 4 => '.', 5 => '{', 6 => '/*', 7 => '@', 8 => "\n", 9 => "\t", 10 => '</', 11 => '<?php', 12 => '<?=', 13 => '<?'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if (preg_match('~[a-z]+\s*\(~iA', $text, $matches, 0, $textPos)) {
				return array(0, $matches[0], $buffer);
			}
			if (preg_match('~^[a-z\\d]+~i', $part, $matches)) {
				return array(1, $matches[0], $buffer);
			}
			if ($delimiters[2] === $letter) {
				return array(2, $delimiters[2], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if ($delimiters[4] === $letter) {
				return array(4, $delimiters[4], $buffer);
			}
			if ($delimiters[5] === $letter) {
				return array(5, $delimiters[5], $buffer);
			}
			if (0 === strpos($part, $delimiters[6])) {
				return array(6, $delimiters[6], $buffer);
			}
			if ($delimiters[7] === $letter) {
				return array(7, $delimiters[7], $buffer);
			}
			if ($delimiters[8] === $letter) {
				return array(8, $delimiters[8], $buffer);
			}
			if ($delimiters[9] === $letter) {
				return array(9, $delimiters[9], $buffer);
			}
			if (0 === strpos($part, $delimiters[10])) {
				return array(10, $delimiters[10], $buffer);
			}
			if (0 === strpos($part, $delimiters[11])) {
				return array(11, $delimiters[11], $buffer);
			}
			if (0 === strpos($part, $delimiters[12])) {
				return array(12, $delimiters[12], $buffer);
			}
			if (0 === strpos($part, $delimiters[13])) {
				return array(13, $delimiters[13], $buffer);
			}
			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state AT_RULE.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter1($text, $textLength, $textPos)
	{
		static $delimiters = array(
			1 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);

			if (preg_match('~^\s+~', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}
			if (0 === strpos($part, $delimiters[1])) {
				return array(1, $delimiters[1], $buffer);
			}
			$buffer .= $text[$textPos];
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state TAG.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter2($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => '{', 1 => ',', 3 => ':', 4 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(2, $matches[0], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if (0 === strpos($part, $delimiters[4])) {
				return array(4, $delimiters[4], $buffer);
			}
			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state ID.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter3($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => '{', 1 => ',', 3 => ':', 4 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(2, $matches[0], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if (0 === strpos($part, $delimiters[4])) {
				return array(4, $delimiters[4], $buffer);
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
	public function findDelimiter4($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => '{', 2 => ',', 3 => ':', 4 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(1, $matches[0], $buffer);
			}
			if ($delimiters[2] === $letter) {
				return array(2, $delimiters[2], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if (0 === strpos($part, $delimiters[4])) {
				return array(4, $delimiters[4], $buffer);
			}
			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state PSEUDO.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter5($text, $textLength, $textPos)
	{
		static $delimiters = array(
			1 => ','
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if (preg_match('~^\s+~', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
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
	public function findDelimiter6($text, $textLength, $textPos)
	{
		static $delimiters = array(
			1 => ':', 2 => ';', 3 => "\n", 4 => "\t", 5 => '}', 6 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if (preg_match('~[-a-z]+~iA', $text, $matches, 0, $textPos)) {
				return array(0, $matches[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if ($delimiters[2] === $letter) {
				return array(2, $delimiters[2], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if ($delimiters[4] === $letter) {
				return array(4, $delimiters[4], $buffer);
			}
			if ($delimiters[5] === $letter) {
				return array(5, $delimiters[5], $buffer);
			}
			if (0 === strpos($part, $delimiters[6])) {
				return array(6, $delimiters[6], $buffer);
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
	public function findDelimiter7($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => ':', 1 => '}', 2 => "\n", 3 => "\t", 4 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if ($delimiters[2] === $letter) {
				return array(2, $delimiters[2], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if (0 === strpos($part, $delimiters[4])) {
				return array(4, $delimiters[4], $buffer);
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
	public function findDelimiter8($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => '#', 1 => ';', 3 => ')', 4 => '}', 5 => "\n", 6 => "\t", 7 => '/*'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if (preg_match('~[a-z]+\s*\(~iA', $text, $matches, 0, $textPos)) {
				return array(2, $matches[0], $buffer);
			}
			if ($delimiters[3] === $letter) {
				return array(3, $delimiters[3], $buffer);
			}
			if ($delimiters[4] === $letter) {
				return array(4, $delimiters[4], $buffer);
			}
			if ($delimiters[5] === $letter) {
				return array(5, $delimiters[5], $buffer);
			}
			if ($delimiters[6] === $letter) {
				return array(6, $delimiters[6], $buffer);
			}
			if (0 === strpos($part, $delimiters[7])) {
				return array(7, $delimiters[7], $buffer);
			}
			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state FUNC.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter9($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => ')'
		);

		$buffer = false;
		while ($textPos < $textLength) {

			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			return array(1, $letter, $buffer);
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
	public function findDelimiter10($text, $textLength, $textPos)
	{

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);

			if (preg_match('~^[^a-f\\d]+~i', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}
			$buffer .= $text[$textPos];
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
	public function findDelimiter11($text, $textLength, $textPos)
	{
		static $delimiters = array(
			0 => "\n", 1 => "\t", 2 => '*/'
		);

		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $text[$textPos];

			if ($delimiters[0] === $letter) {
				return array(0, $delimiters[0], $buffer);
			}
			if ($delimiters[1] === $letter) {
				return array(1, $delimiters[1], $buffer);
			}
			if (0 === strpos($part, $delimiters[2])) {
				return array(2, $delimiters[2], $buffer);
			}
			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}