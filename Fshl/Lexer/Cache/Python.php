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
 * Optimized and cached Python lexer.
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
 * @see Fshl_Lexer_Python
 */
class Fshl_Lexer_Cache_Python
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
		$this->version = '0.4.11/1.1';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 0, 1 => 0
				), 1 => array(
					0 => 1, 1 => -1
				), 2 => array(
					0 => 1, 1 => -1
				), 3 => array(
					0 => 2, 1 => 0
				), 4 => array(
					0 => 3, 1 => 0
				), 5 => array(
					0 => 4, 1 => 0
				), 6 => array(
					0 => 5, 1 => 0
				), 7 => array(
					0 => 6, 1 => 0
				), 8 => array(
					0 => 7, 1 => 0
				), 9 => array(
					0 => 7, 1 => 0
				), 10 => array(
					0 => 8, 1 => 0
				), 11 => array(
					0 => 8, 1 => 0
				)
			), 1 => array(
				0 => array(
					0 => 11, 1 => 0
				)
			), 2 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 2, 1 => 0
				), 2 => array(
					0 => 2, 1 => 0
				), 3 => array(
					0 => 2, 1 => 0
				)
			), 3 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 3, 1 => 0
				), 2 => array(
					0 => 3, 1 => 0
				), 3 => array(
					0 => 3, 1 => 0
				)
			), 4 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 4, 1 => 0
				), 2 => array(
					0 => 4, 1 => 0
				), 3 => array(
					0 => 4, 1 => 0
				)
			), 5 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 5, 1 => 0
				), 2 => array(
					0 => 5, 1 => 0
				), 3 => array(
					0 => 5, 1 => 0
				)
			), 6 => array(
				0 => array(
					0 => 11, 1 => 1
				), 1 => array(
					0 => 6, 1 => 0
				)
			), 7 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 1
				)
			), 8 => array(
				0 => array(
					0 => 9, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 0
				), 3 => array(
					0 => 11, 1 => 0
				), 4 => array(
					0 => 11, 1 => 0
				), 5 => array(
					0 => 10, 1 => 0
				), 6 => array(
					0 => 10, 1 => 0
				), 7 => array(
					0 => 10, 1 => 0
				), 8 => array(
					0 => 11, 1 => 1
				)
			), 9 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 10, 1 => 0
				), 3 => array(
					0 => 10, 1 => 0
				), 4 => array(
					0 => 10, 1 => 0
				), 5 => array(
					0 => 11, 1 => 1
				)
			), 10 => array(
				0 => array(
					0 => 11, 1 => 0
				), 1 => array(
					0 => 11, 1 => 0
				), 2 => array(
					0 => 11, 1 => 1
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 11;
		$this->quitState = 12;
		$this->flags = array(
			0 => 0, 1 => 5, 2 => 4, 3 => 4, 4 => 4, 5 => 4, 6 => 4, 7 => 4, 8 => 4, 9 => 0, 10 => 0
		);
		$this->data = array(
			0 => NULL, 1 => NULL, 2 => NULL, 3 => NULL, 4 => NULL, 5 => NULL, 6 => NULL, 7 => NULL, 8 => NULL, 9 => NULL, 10 => NULL
		);
		$this->classes = array(
			0 => NULL, 1 => NULL, 2 => 'py-docstring', 3 => 'py-docstring', 4 => 'py-quote', 5 => 'py-quote', 6 => 'py-comment', 7 => 'py-number', 8 => 'py-number', 9 => 'py-number', 10 => 'py-number'
		);
		$this->keywords = array(
			0 => 'py-keyword', 1 => array(
				'and' => 1, 'as' => 1, 'assert' => 1, 'break' => 1, 'class' => 1, 'continue' => 1, 'def' => 1, 'del' => 1, 'elif' => 1, 'else' => 1, 'except' => 1, 'exec' => 1, 'finally' => 1, 'for' => 1, 'from' => 1, 'global' => 1, 'if' => 1, 'import' => 1, 'in' => 1, 'is' => 1, 'lambda' => 1, 'not' => 1, 'or' => 1, 'pass' => 1, 'print' => 1, 'raise' => 1,
			'return' => 1, 'try' => 1, 'while' => 1, 'with' => 1, 'yield' => 1, 'abs' => 2, 'all' => 2, 'any' => 2, 'apply' => 2, 'basestring' => 2, 'bool' => 2, 'buffer' => 2, 'callable' => 2, 'chr' => 2, 'classmethod' => 2, 'cmp' => 2, 'coerce' => 2, 'compile' => 2, 'complex' => 2, 'delattr' => 2, 'dict' => 2, 'dir' => 2, 'divmod' => 2, 'enumerate' => 2, 'eval' => 2, 'execfile' => 2,
			'file' => 2, 'filter' => 2, 'float' => 2, 'frozenset' => 2, 'getattr' => 2, 'globals' => 2, 'hasattr' => 2, 'hash' => 2, 'hex' => 2, 'id' => 2, 'input' => 2, 'int' => 2, 'intern' => 2, 'isinstance' => 2, 'issubclass' => 2, 'iter' => 2, 'len' => 2, 'list' => 2, 'locals' => 2, 'long' => 2, 'map' => 2, 'max' => 2, 'min' => 2, 'object' => 2, 'oct' => 2, 'open' => 2,
			'ord' => 2, 'pow' => 2, 'property' => 2, 'range' => 2, 'raw_input' => 2, 'reduce' => 2, 'reload' => 2, 'repr' => 2, 'reversed' => 2, 'round' => 2, 'set' => 2, 'setattr' => 2, 'slice' => 2, 'sorted' => 2, 'staticmethod' => 2, 'str' => 2, 'sum' => 2, 'super' => 2, 'tuple' => 2, 'type' => 2, 'unichr' => 2, 'unicode' => 2, 'vars' => 2, 'xrange' => 2, 'zip' => 2, 'ArithmeticError' => 3,
			'AssertionError' => 3, 'AttributeError' => 3, 'BaseException' => 3, 'DeprecationWarning' => 3, 'EOFError' => 3, 'Ellipsis' => 3, 'EnvironmentError' => 3, 'Exception' => 3, 'FloatingPointError' => 3, 'FutureWarning' => 3, 'GeneratorExit' => 3, 'IOError' => 3, 'ImportError' => 3, 'ImportWarning' => 3, 'IndentationError' => 3, 'IndexError' => 3, 'KeyError' => 3, 'KeyboardInterrupt' => 3, 'LookupError' => 3, 'MemoryError' => 3, 'NameError' => 3, 'NotImplemented' => 3, 'NotImplementedError' => 3, 'OSError' => 3, 'OverflowError' => 3, 'OverflowWarning' => 3,
			'PendingDeprecationWarning' => 3, 'ReferenceError' => 3, 'RuntimeError' => 3, 'RuntimeWarning' => 3, 'StandardError' => 3, 'StopIteration' => 3, 'SyntaxError' => 3, 'SyntaxWarning' => 3, 'SystemError' => 3, 'SystemExit' => 3, 'TabError' => 3, 'TypeError' => 3, 'UnboundLocalError' => 3, 'UnicodeDecodeError' => 3, 'UnicodeEncodeError' => 3, 'UnicodeError' => 3, 'UnicodeTranslateError' => 3, 'UnicodeWarning' => 3, 'UserWarning' => 3, 'ValueError' => 3, 'Warning' => 3, 'WindowsError' => 3, 'ZeroDivisionError' => 3, 'BufferType' => 3, 'BuiltinFunctionType' => 3, 'BuiltinMethodType' => 3,
			'ClassType' => 3, 'CodeType' => 3, 'ComplexType' => 3, 'DictProxyType' => 3, 'DictType' => 3, 'DictionaryType' => 3, 'EllipsisType' => 3, 'FileType' => 3, 'FloatType' => 3, 'FrameType' => 3, 'FunctionType' => 3, 'GeneratorType' => 3, 'InstanceType' => 3, 'IntType' => 3, 'LambdaType' => 3, 'ListType' => 3, 'LongType' => 3, 'MethodType' => 3, 'ModuleType' => 3, 'NoneType' => 3, 'ObjectType' => 3, 'SliceType' => 3, 'StringType' => 3, 'StringTypes' => 3, 'TracebackType' => 3, 'TupleType' => 3,
			'TypeType' => 3, 'UnboundMethodType' => 3, 'UnicodeType' => 3, 'XRangeType' => 3, 'False' => 3, 'None' => 3, 'True' => 3, '__abs__' => 3, '__add__' => 3, '__all__' => 3, '__author__' => 3, '__bases__' => 3, '__builtins__' => 3, '__call__' => 3, '__class__' => 3, '__cmp__' => 3, '__coerce__' => 3, '__contains__' => 3, '__debug__' => 3, '__del__' => 3, '__delattr__' => 3, '__delitem__' => 3, '__delslice__' => 3, '__dict__' => 3, '__div__' => 3, '__divmod__' => 3,
			'__doc__' => 3, '__eq__' => 3, '__file__' => 3, '__float__' => 3, '__floordiv__' => 3, '__future__' => 3, '__ge__' => 3, '__getattr__' => 3, '__getattribute__' => 3, '__getitem__' => 3, '__getslice__' => 3, '__gt__' => 3, '__hash__' => 3, '__hex__' => 3, '__iadd__' => 3, '__import__' => 3, '__imul__' => 3, '__init__' => 3, '__int__' => 3, '__invert__' => 3, '__iter__' => 3, '__le__' => 3, '__len__' => 3, '__long__' => 3, '__lshift__' => 3, '__lt__' => 3,
			'__members__' => 3, '__metaclass__' => 3, '__mod__' => 3, '__mro__' => 3, '__mul__' => 3, '__name__' => 3, '__ne__' => 3, '__neg__' => 3, '__new__' => 3, '__nonzero__' => 3, '__oct__' => 3, '__or__' => 3, '__path__' => 3, '__pos__' => 3, '__pow__' => 3, '__radd__' => 3, '__rdiv__' => 3, '__rdivmod__' => 3, '__reduce__' => 3, '__repr__' => 3, '__rfloordiv__' => 3, '__rlshift__' => 3, '__rmod__' => 3, '__rmul__' => 3, '__ror__' => 3, '__rpow__' => 3,
			'__rrshift__' => 3, '__rsub__' => 3, '__rtruediv__' => 3, '__rxor__' => 3, '__setattr__' => 3, '__setitem__' => 3, '__setslice__' => 3, '__self__' => 3, '__slots__' => 3, '__str__' => 3, '__sub__' => 3, '__truediv__' => 3, '__version__' => 3, '__xor__' => 3
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
			if ('_' === $letter) {
				return array(2, '_', $buffer);
			}
			if ($textPos === strpos($text, '\'\'\'', $textPos)) {
				return array(3, '\'\'\'', $buffer);
			}
			if ($textPos === strpos($text, '"""', $textPos)) {
				return array(4, '"""', $buffer);
			}
			if ('\'' === $letter) {
				return array(5, '\'', $buffer);
			}
			if ('"' === $letter) {
				return array(6, '"', $buffer);
			}
			if ('#' === $letter) {
				return array(7, '#', $buffer);
			}
			if ($textPos === strpos($text, '0x', $textPos)) {
				return array(8, '0x', $buffer);
			}
			if ($textPos === strpos($text, '0X', $textPos)) {
				return array(9, '0X', $buffer);
			}
			if ('.' === $letter && preg_match('~^\\d$~', $text[$textPos + 1])) {
				return array(10, $letter, $buffer);
			}
			if (preg_match('~^\\d$~', $letter)) {
				return array(11, $letter, $buffer);
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
	 * Parses state DOCSTRING1.
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
			if ($textPos === strpos($text, '\'\'\'', $textPos)) {
				return array(0, '\'\'\'', $buffer);
			}
			if ($textPos === strpos($text, '\\\\', $textPos)) {
				return array(1, '\\\\', $buffer);
			}
			if ($textPos === strpos($text, '\\\'\'\'', $textPos)) {
				return array(2, '\\\'\'\'', $buffer);
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
	 * Parses state DOCSTRING2.
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
			if ($textPos === strpos($text, '"""', $textPos)) {
				return array(0, '"""', $buffer);
			}
			if ($textPos === strpos($text, '\\\\', $textPos)) {
				return array(1, '\\\\', $buffer);
			}
			if ($textPos === strpos($text, '\\"""', $textPos)) {
				return array(2, '\\"""', $buffer);
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
	 * Parses state QUOTE1.
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
			if ('\'' === $letter) {
				return array(0, '\'', $buffer);
			}
			if ($textPos === strpos($text, '\\\\', $textPos)) {
				return array(1, '\\\\', $buffer);
			}
			if ($textPos === strpos($text, '\\\'', $textPos)) {
				return array(2, '\\\'', $buffer);
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
	 * Parses state QUOTE2.
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
			if ('"' === $letter) {
				return array(0, '"', $buffer);
			}
			if ($textPos === strpos($text, '\\\\', $textPos)) {
				return array(1, '\\\\', $buffer);
			}
			if ($textPos === strpos($text, '\\"', $textPos)) {
				return array(2, '\\"', $buffer);
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

	/**
	 * Parses state NUM_HEXADECIMAL.
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
			if ('L' === $letter) {
				return array(0, 'L', $buffer);
			}
			if ('l' === $letter) {
				return array(1, 'l', $buffer);
			}
			if (preg_match('~^[^a-f\\d]$~i', $letter)) {
				return array(2, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state NUM_DECIMAL.
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
			if ('.' === $letter) {
				return array(0, '.', $buffer);
			}
			if ('L' === $letter) {
				return array(1, 'L', $buffer);
			}
			if ('l' === $letter) {
				return array(2, 'l', $buffer);
			}
			if ('j' === $letter) {
				return array(3, 'j', $buffer);
			}
			if ('J' === $letter) {
				return array(4, 'J', $buffer);
			}
			if ($textPos === strpos($text, 'e-', $textPos)) {
				return array(5, 'e-', $buffer);
			}
			if ($textPos === strpos($text, 'e+', $textPos)) {
				return array(6, 'e+', $buffer);
			}
			if ('e' === $letter) {
				return array(7, 'e', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(8, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state NUM_FRACTION.
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
			if ('j' === $letter) {
				return array(0, 'j', $buffer);
			}
			if ('J' === $letter) {
				return array(1, 'J', $buffer);
			}
			if ($textPos === strpos($text, 'e-', $textPos)) {
				return array(2, 'e-', $buffer);
			}
			if ($textPos === strpos($text, 'e+', $textPos)) {
				return array(3, 'e+', $buffer);
			}
			if ('e' === $letter) {
				return array(4, 'e', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(5, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

	/**
	 * Parses state NUM_EXPONENT.
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
			if ('j' === $letter) {
				return array(0, 'j', $buffer);
			}
			if ('J' === $letter) {
				return array(1, 'J', $buffer);
			}
			if (preg_match('~^\\D$~', $letter)) {
				return array(2, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}