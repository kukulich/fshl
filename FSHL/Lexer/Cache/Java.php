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
 * Optimized and cached Java lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 * @see \FSHL\Generator
 * @see \FSHL\Lexer\Java
 */
class Java
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
					0 => 1, 1 => -1
				), 1 => array(
					0 => 2, 1 => 0
				), 2 => array(
					0 => 5, 1 => 0
				), 3 => array(
					0 => 6, 1 => 0
				), 4 => array(
					0 => 7, 1 => 0
				), 5 => array(
					0 => 8, 1 => 0
				), 6 => array(
					0 => 0, 1 => 0
				)
			), 1 => array(
				0 => array(
					0 => 9, 1 => 1
				)
			), 2 => array(
				0 => array(
					0 => 4, 1 => 0
				), 1 => array(
					0 => 3, 1 => 0
				), 2 => array(
					0 => 3, 1 => 0
				), 3 => array(
					0 => 9, 1 => 1
				)
			), 3 => array(
				0 => array(
					0 => 3, 1 => 0
				), 1 => array(
					0 => 9, 1 => 1
				)
			), 4 => array(
				0 => array(
					0 => 9, 1 => 1
				)
			), 5 => array(
				0 => array(
					0 => 5, 1 => 0
				), 1 => array(
					0 => 5, 1 => 0
				), 2 => array(
					0 => 5, 1 => 0
				), 3 => array(
					0 => 9, 1 => 0
				)
			), 6 => array(
				0 => array(
					0 => 6, 1 => 0
				), 1 => array(
					0 => 6, 1 => 0
				), 2 => array(
					0 => 6, 1 => 0
				), 3 => array(
					0 => 9, 1 => 0
				)
			), 7 => array(
				0 => array(
					0 => 9, 1 => 0
				), 1 => array(
					0 => 7, 1 => 0
				)
			), 8 => array(
				0 => array(
					0 => 9, 1 => 1
				), 1 => array(
					0 => 8, 1 => 0
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 9;
		$this->quitState = 10;
		$this->flags = array(
			0 => 0, 1 => 5, 2 => 4, 3 => 0, 4 => 0, 5 => 4, 6 => 4, 7 => 4, 8 => 4
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => NULL, 8 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => NULL, 2 => 'java-num', 3 => 'java-num', 4 => 'java-num', 5 => 'java-quote', 6 => 'java-quote', 7 => 'java-comment', 8 => 'java-comment'
		);
		$this->keywords = array(
			0 => 'java-keywords', 1 => array(
				'abstract' => 1, 'double' => 1, 'int' => 1, 'strictfp' => 1, 'boolean' => 1, 'else' => 1, 'interface' => 1, 'super' => 1, 'break' => 1, 'extends' => 1, 'long' => 1, 'switch' => 1, 'byte' => 1, 'final' => 1, 'native' => 1, 'synchronized' => 1, 'case' => 1, 'finally' => 1, 'new' => 1, 'this' => 1, 'catch' => 1, 'float' => 1, 'package' => 1, 'throw' => 1, 'char' => 1, 'for' => 1,
			'private' => 1, 'throws' => 1, 'class' => 1, 'goto' => 1, 'protected' => 1, 'transient' => 1, 'const' => 1, 'if' => 1, 'public' => 1, 'try' => 1, 'continue' => 1, 'implements' => 1, 'return' => 1, 'void' => 1, 'default' => 1, 'import' => 1, 'short' => 1, 'volatile' => 1, 'do' => 1, 'instanceof' => 1, 'static' => 1, 'while' => 1
			), 2 => true
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
			if (preg_match('~^[a-z]+~i', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}
			if (preg_match('~^\\d+~', $part, $matches)) {
				return array(1, $matches[0], $buffer);
			}
			if ('"' === $letter) {
				return array(2, '"', $buffer);
			}
			if ('\'' === $letter) {
				return array(3, '\'', $buffer);
			}
			if (0 === strpos($part, '/*')) {
				return array(4, '/*', $buffer);
			}
			if (0 === strpos($part, '//')) {
				return array(5, '//', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(6, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state KEYWORD.
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
			if (preg_match('~^\\W+~', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state NUM.
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
			if ('x' === $letter) {
				return array(0, 'x', $buffer);
			}
			if ('.' === $letter) {
				return array(1, '.', $buffer);
			}
			if (preg_match('~^\\d+~', $part, $matches)) {
				return array(2, $matches[0], $buffer);
			}
			if (preg_match('~^\\D+~', $part, $matches)) {
				return array(3, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state DEC_NUM.
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
			if ('.' === $letter) {
				return array(0, '.', $buffer);
			}
			if (preg_match('~^\\D+~', $part, $matches)) {
				return array(1, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state HEX_NUM.
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
			if (preg_match('~^[^a-f\\d]+~i', $part, $matches)) {
				return array(0, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state QUOTE1.
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
			if (0 === strpos($part, '\\\\')) {
				return array(0, '\\\\', $buffer);
			}
			if (0 === strpos($part, '\\"')) {
				return array(1, '\\"', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(2, $letter, $buffer);
			}
			if ('"' === $letter) {
				return array(3, '"', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state QUOTE2.
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
			if (0 === strpos($part, '\\\\')) {
				return array(0, '\\\\', $buffer);
			}
			if (0 === strpos($part, '\\\'')) {
				return array(1, '\\\'', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(2, $letter, $buffer);
			}
			if ('\'' === $letter) {
				return array(3, '\'', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state COMMENT1.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter7(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if (0 === strpos($part, '*/')) {
				return array(0, '*/', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(1, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state COMMENT2.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter8(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ("\n" === $letter) {
				return array(0, "\n", $buffer);
			}
			if ("\t" === $letter) {
				return array(1, "\t", $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}