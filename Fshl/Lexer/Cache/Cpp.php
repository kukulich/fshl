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
 * Optimized and cached Cpp lexer.
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
 * @see Fshl_Lexer_Cpp
 */
class Fshl_Lexer_Cache_Cpp
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
		$this->version = '0.4.11/1.2';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 0, 1 => 0
				), 1 => array(
					0 => 1, 1 => -1
				), 2 => array(
					0 => 10, 1 => 0
				), 3 => array(
					0 => 6, 1 => 0
				), 4 => array(
					0 => 2, 1 => 0
				), 5 => array(
					0 => 4, 1 => 0
				), 6 => array(
					0 => 7, 1 => 0
				), 7 => array(
					0 => 8, 1 => 0
				), 8 => array(
					0 => 9, 1 => 0
				)
			), 1 => array(
				0 => array(
					0 => 11, 1 => 0
				)
			), 2 => array(
				0 => array(
					0 => 3, 1 => 0
				), 1 => array(
					0 => 5, 1 => 0
				), 2 => array(
					0 => 4, 1 => 0
				), 3 => array(
					0 => 11, 1 => 1
				)
			), 3 => array(
				0 => array(
					0 => 3, 1 => 0
				), 1 => array(
					0 => 3, 1 => 0
				), 2 => array(
					0 => 11, 1 => 1
				)
			), 4 => array(
				0 => array(
					0 => 4, 1 => 0
				), 1 => array(
					0 => 11, 1 => 1
				)
			), 5 => array(
				0 => array(
					0 => 5, 1 => 0
				), 1 => array(
					0 => 11, 1 => 1
				)
			), 6 => array(
				0 => array(
					0 => 6, 1 => 0
				), 1 => array(
					0 => 6, 1 => 0
				), 2 => array(
					0 => 6, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				)
			), 7 => array(
				0 => array(
					0 => 7, 1 => 0
				), 1 => array(
					0 => 7, 1 => 0
				), 2 => array(
					0 => 7, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				)
			), 8 => array(
				0 => array(
					0 => 8, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 8, 1 => 0
				)
			), 9 => array(
				0 => array(
					0 => 9, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				)
			), 10 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 10, 1 => 0
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 11;
		$this->quitState = 12;
		$this->flags = array(
			0 => 0, 1 => 5, 2 => 4, 3 => 0, 4 => 4, 5 => 0, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 4
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => NULL, 8 => NULL, 9 => NULL, 10 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => NULL, 2 => 'cpp-num', 3 => 'cpp-num', 4 => 'cpp-num', 5 => 'cpp-num', 6 => 'cpp-preproc', 7 => 'cpp-quote', 8 => 'cpp-quote', 9 => 'cpp-comment', 10 => 'cpp-comment'
		);
		$this->keywords = array(
			0 => 'cpp-keywords', 1 => array(
				'bool' => 1, 'break' => 1, 'case' => 1, 'catch' => 1, 'char' => 1, 'class' => 1, 'const' => 1, 'const_cast' => 1, 'continue' => 1, 'default' => 1, 'delete' => 1, 'deprecated' => 1, 'dllexport' => 1, 'dllimport' => 1, 'do' => 1, 'double' => 1, 'dynamic_cast' => 1, 'else' => 1, 'enum' => 1, 'explicit' => 1, 'extern' => 1, 'false' => 1, 'float' => 1, 'for' => 1, 'friend' => 1, 'goto' => 1,
			'if' => 1, 'inline' => 1, 'int' => 1, 'long' => 1, 'mutable' => 1, 'naked' => 1, 'namespace' => 1, 'new' => 1, 'noinline' => 1, 'noreturn' => 1, 'nothrow' => 1, 'novtable' => 1, 'operator' => 1, 'private' => 1, 'property' => 1, 'protected' => 1, 'public' => 1, 'register' => 1, 'reinterpret_cast' => 1, 'return' => 1, 'selectany' => 1, 'short' => 1, 'signed' => 1, 'sizeof' => 1, 'static' => 1, 'static_cast' => 1,
			'struct' => 1, 'switch' => 1, 'template' => 1, 'this' => 1, 'thread' => 1, 'throw' => 1, 'true' => 1, 'try' => 1, 'typedef' => 1, 'typeid' => 1, 'typename' => 1, 'union' => 1, 'unsigned' => 1, 'using' => 1, 'uuid' => 1, 'virtual' => 1, 'void' => 1, 'volatile' => 1, '__wchar_t' => 1, 'wchar_t' => 1, 'while' => 1, '__abstract' => 1, '__alignof' => 1, '__asm' => 1, '__assume' => 1, '__based' => 1,
			'__box' => 1, '__cdecl' => 1, '__declspec' => 1, '__delegate' => 1, '__event' => 1, '__except' => 1, '__fastcall' => 1, '__finally' => 1, '__forceinline' => 1, '__gc' => 1, '__hook' => 1, '__identifier' => 1, '__if_exists' => 1, '__if_not_exists' => 1, '__inline' => 1, '__int8' => 1, '__int16' => 1, '__int32' => 1, '__int64' => 1, '__interface' => 1, '__leave' => 1, '__m64' => 1, '__m128' => 1, '__m128d' => 1, '__m128i' => 1, '__multiple_inheritance' => 1,
			'__nogc' => 1, '__noop' => 1, '__pin' => 1, '__property' => 1, '__raise' => 1, '__sealed' => 1, '__single_inheritance' => 1, '__stdcall' => 1, '__super' => 1, '__try_cast' => 1, '__try' => 1, '__unhook' => 1, '__uuidof' => 1, '__value' => 1, '__virtual_inheritance' => 1, '__w64' => 1
			), 2 => true
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
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}
			if (preg_match('~^[a-z]$~i', $letter)) {
				return array(1, $letter, $buffer);
			}
			if ($textPos === strpos($text, '//', $textPos)) {
				return array(2, '//', $buffer);
			}
			if ('#' === $letter) {
				return array(3, '#', $buffer);
			}
			if (preg_match('~^\\d$~', $letter)) {
				return array(4, $letter, $buffer);
			}
			if ('.' === $letter && preg_match('~^\\d$~', $text[$textPos + 1])) {
				return array(5, $letter, $buffer);
			}
			if ('"' === $letter) {
				return array(6, '"', $buffer);
			}
			if ('\'' === $letter) {
				return array(7, '\'', $buffer);
			}
			if ($textPos === strpos($text, '/*', $textPos)) {
				return array(8, '/*', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state KEYWORD.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart1(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if (preg_match('~^\\W$~i', $letter)) {
				return array(0, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state NUM.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart2(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if (preg_match('~^\\d$~', $letter)) {
				return array(0, $letter, $buffer);
			}
			if ('x' === $letter) {
				return array(1, 'x', $buffer);
			}
			if ('.' === $letter) {
				return array(2, '.', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(3, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state DEC_NUM.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart3(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('.' === $letter) {
				return array(0, '.', $buffer);
			}
			if ('f' === $letter) {
				return array(1, 'f', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(2, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state FLOAT_NUM.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart4(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('f' === $letter) {
				return array(0, 'f', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(1, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state HEX_NUM.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart5(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('L' === $letter) {
				return array(0, 'L', $buffer);
			}
			if (preg_match('~^[^a-f\\d]$~i', $letter)) {
				return array(1, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state PREPROC.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart6(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ($textPos === strpos($text, '\\
', $textPos)) {
				return array(0, '\\
', $buffer);
			}
			if ('	' === $letter) {
				return array(1, '	', $buffer);
			}
			if ($textPos === strpos($text, '\\
', $textPos)) {
				return array(2, '\\
', $buffer);
			}
			if ('
' === $letter) {
				return array(3, '
', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state QUOTE1.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart7(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ($textPos === strpos($text, '\\\\', $textPos)) {
				return array(0, '\\\\', $buffer);
			}
			if ($textPos === strpos($text, '\\"', $textPos)) {
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
	 * Parses state QUOTE2.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart8(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ($textPos === strpos($text, '\\\'', $textPos)) {
				return array(0, '\\\'', $buffer);
			}
			if ('\'' === $letter) {
				return array(1, '\'', $buffer);
			}
			if ("\t" === $letter || "\n" === $letter) {
				return array(2, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state COMMENT1.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart9(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}
			if ($textPos === strpos($text, '*/', $textPos)) {
				return array(1, '*/', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state COMMENT2.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function getPart10(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ('
' === $letter) {
				return array(0, '
', $buffer);
			}
			if ('	' === $letter) {
				return array(1, '	', $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}