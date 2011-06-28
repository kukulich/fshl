<?php

/**
 * FSHL                              | Universal Syntax HighLighter |
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

namespace FSHL\Lexer\Cache;

/**
 * Optimized and cached HtmlOnly lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 * @see \FSHL\Generator
 * @see \FSHL\Lexer\HtmlOnly
 */
class HtmlOnly
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
					0 => 6, 1 => 0
				), 1 => array(
					0 => 2, 1 => 0
				), 2 => array(
					0 => 1, 1 => 0
				), 3 => array(
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
				)
			), 3 => array(
				0 => array(
					0 => 4, 1 => 0
				), 1 => array(
					0 => 0, 1 => 1
				), 2 => array(
					0 => 3, 1 => 0
				), 3 => array(
					0 => 5, 1 => 0
				)
			), 4 => array(
				0 => array(
					0 => 3, 1 => 0
				)
			), 5 => array(
				0 => array(
					0 => 3, 1 => 0
				)
			), 6 => array(
				0 => array(
					0 => 0, 1 => 1
				), 1 => array(
					0 => 6, 1 => 0
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 7;
		$this->quitState = 8;
		$this->flags = array(
			0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => 'html-entity', 2 => 'html-tag', 3 => 'html-tagin', 4 => 'html-quote', 5 => 'html-quote', 6 => 'html-comment'
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
			if (0 === strpos($part, '<!--')) {
				return array(0, '<!--', $buffer);
			}
			if ('<' === $letter) {
				return array(1, '<', $buffer);
			}
			if ('&' === $letter) {
				return array(2, '&', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(3, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state ENTITY.
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
			if (';' === $letter) {
				return array(0, ';', $buffer);
			}
			if ('&' === $letter) {
				return array(1, '&', $buffer);
			}
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(2, $matches[0], $buffer);
			}

			$buffer .= $letter;
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
	public function findDelimiter2(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ('>' === $letter) {
				return array(0, '>', $buffer);
			}
			if (preg_match('~^\s+~', $part, $matches)) {
				return array(1, $matches[0], $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Finds a delimiter for state inTAG.
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
			if ('"' === $letter) {
				return array(0, '"', $buffer);
			}
			if ('>' === $letter) {
				return array(1, '>', $buffer);
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
	 * Finds a delimiter for state QUOTE1.
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
			if ('"' === $letter) {
				return array(0, '"', $buffer);
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
	public function findDelimiter5(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ('\'' === $letter) {
				return array(0, '\'', $buffer);
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
			if (0 === strpos($part, '-->')) {
				return array(0, '-->', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(1, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}