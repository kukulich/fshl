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
 * Javascript lexer.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lexer
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Lexer_Javascript implements Fshl_Lexer
{
	/**
	 * Returns version.
	 *
	 * @return string
	 */
	public function getVersion()
	{
		return '1.2';
	}

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState()
	{
		return 'OUT';
	}

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates()
	{
		return array(
			'OUT' => array(
				array(
					'_COUNTAB' => array('OUT', 0),
					'ALPHA' => array('KEYWORD', -1),
					'.' => array('KEYWORD', 1),
					'NUMBER' => array('NUM', 0),
					'"' => array('QUOTE1', 0),
					'\'' => array('QUOTE2', 0),
					'/*' => array('COMMENT1', 0),
					'//' => array('COMMENT2', 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'</' => array(Fshl_Generator::STATE_QUIT, 0)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'js-out',
				null
			),
			// Keyword
			'KEYWORD' => array(
				array(
					'!SAFECHAR' => array(Fshl_Generator::STATE_RETURN, 0)
				),
				Fshl_Generator::STATE_FLAG_KEYWORD | Fshl_Generator::STATE_FLAG_RECURSION,
				'js-out',
				null
			),
			// Numbers
			'NUM' => array(
				array(
					'x' => array('HEX_NUM', 0),
					'.' => array('DEC_NUM', 0),
					'!NUMBER' => array(Fshl_Generator::STATE_RETURN, 1),
					'NUMBER' => array('DEC_NUM', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'js-num',
				null
			),
			'DEC_NUM' => array(
				array(
					'.' => array('DEC_NUM', 0),
					'!NUMBER' => array(Fshl_Generator::STATE_RETURN, 1)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'js-num',
				null
			),
			'HEX_NUM' => array(
				array(
					'!HEXNUM' => array(Fshl_Generator::STATE_RETURN, 1)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'js-num',
				null
			),
			// Quotes BF definition
			'QUOTE1' => array(
				array(
					'"' => array(Fshl_Generator::STATE_RETURN, 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'js-quote',
				null
			),
			'QUOTE2' => array(
				array(
					'\'' => array(Fshl_Generator::STATE_RETURN, 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'js-quote',
				null
			),
			// Comments
			'COMMENT1' => array(
				array(
					'_COUNTAB' => array('COMMENT1', 0),
					'*/' => array(Fshl_Generator::STATE_RETURN, 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'js-comment',
				null
			),
			'COMMENT2' => array(
				array(
					"\n" => array(Fshl_Generator::STATE_RETURN, 0),
					'_COUNTAB' => array('COMMENT2', 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'js-comment',
				null
			),
			'TO_PHP' => array(
				null,
				Fshl_Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'PHP'
			),
			Fshl_Generator::STATE_QUIT => array(
				null,
				Fshl_Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				null,
			)
		);
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return array(
			'js-keywords',
			array(
				'abstract' => 1,
				'boolean' => 1,
				'break' => 1,
				'byte' => 1,
				'case' => 1,
				'catch' => 1,
				'char' => 1,
				'class' => 1,
				'const' => 1,
				'continue' => 1,
				'debugger' => 1,
				'default' => 1,
				'delete' => 1,
				'do' => 1,
				'double' => 1,
				'else' => 1,
				'enum' => 1,
				'export' => 1,
				'extends' => 1,
				'false' => 1,
				'final' => 1,
				'finally' => 1,
				'float' => 1,
				'for' => 1,
				'function' => 1,
				'goto' => 1,
				'if' => 1,
				'implements' => 1,
				'import' => 1,
				'in' => 1,
				'instanceof' => 1,
				'int' => 1,
				'interface' => 1,
				'long' => 1,
				'native' => 1,
				'new' => 1,
				'null' => 1,
				'package' => 1,
				'private' => 1,
				'protected' => 1,
				'public' => 1,
				'return' => 1,
				'short' => 1,
				'static' => 1,
				'super' => 1,
				'switch' => 1,
				'synchronized' => 1,
				'this' => 1,
				'throw' => 1,
				'throws' => 1,
				'transient' => 1,
				'true' => 1,
				'try' => 1,
				'typeof' => 1,
				'var' => 1,
				'void' => 1,
				'volatile' => 1,
				'while' => 1,
				'with' => 1,

				'document' => 2,
				'getAttribute' => 2,
				'getElementsByTagName' => 2,
				'getElementById' => 2,
			),
			Fshl_Generator::CASE_SENSITIVE
		);
	}
}
