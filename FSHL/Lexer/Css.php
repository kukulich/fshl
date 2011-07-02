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

namespace FSHL\Lexer;

use FSHL;

/**
 * CSS lexer.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class Css implements FSHL\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'Css';
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
					'_LINE' => array('OUT', 0),
					'_TAB' => array('OUT', 0),
					'@' => array('AT_RULE', 0),
					'FUNC' => array('FUNC', 0),
					'{' => array('DEF', 0),
					'ALNUM' => array('TAG', 0),
					'*' => array('TAG', 0),
					'#' => array('ID', 0),
					'.' => array('CLASS', 0),
					'/*' => array('COMMENT', 0),
					'</' => array(FSHL\Generator::STATE_QUIT, 0),
					'<?php' => array('PHP', 0),
					'<?=' => array('PHP', 0),
					'<?' => array('PHP', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'AT_RULE' => array(
				array(
					'SPACE' => array(FSHL\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-at-rule',
				null
			),
			'TAG' => array(
				array(
					':' => array('PSEUDO', 0),
					',' => array(FSHL\Generator::STATE_RETURN, 1),
					'SPACE' => array(FSHL\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0),
					'{' => array(FSHL\Generator::STATE_RETURN, 1)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-tag',
				null
			),
			'ID' => array(
				array(
					':' => array('PSEUDO', 0),
					',' => array(FSHL\Generator::STATE_RETURN, 1),
					'SPACE' => array(FSHL\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0),
					'{' => array(FSHL\Generator::STATE_RETURN, 1)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-id',
				null
			),
			'CLASS' => array(
				array(
					':' => array('PSEUDO', 0),
					',' => array(FSHL\Generator::STATE_RETURN, 1),
					'SPACE' => array(FSHL\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0),
					'{' => array(FSHL\Generator::STATE_RETURN, 1)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-class',
				null
			),
			'PSEUDO' => array(
				array(
					',' => array(FSHL\Generator::STATE_RETURN, 1),
					'SPACE' => array(FSHL\Generator::STATE_RETURN, 1),
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-pseudo',
				null
			),
			'DEF' => array(
				array(
					':' => array('VALUE', 1),
					'_LINE' => array('DEF', 0),
					'_TAB' => array('DEF', 0),
					';' => array('DEF', 1),
					'}' => array(FSHL\Generator::STATE_RETURN, 0),
					'/*' => array('COMMENT', 0),
					'PROPERTY' => array('PROPERTY', 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				null,
				null
			),
			'PROPERTY' => array(
				array(
					'_LINE' => array('PROPERTY', 0),
					'_TAB' => array('PROPERTY', 0),
					':' => array(FSHL\Generator::STATE_RETURN, 1),
					'}' => array(FSHL\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-property',
				null
			),
			'VALUE' => array(
				array(
					'FUNC' => array('FUNC', 0),
					';' => array(FSHL\Generator::STATE_RETURN, 1),
					'#' => array('COLOR', 0),
					')' => array(FSHL\Generator::STATE_RETURN, 1),
					'}' => array(FSHL\Generator::STATE_RETURN, 1),
					'_LINE' => array('VALUE', 0),
					'_TAB' => array('VALUE', 0),
					'/*' => array('COMMENT', 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-value',
				null
			),
			'FUNC' => array(
				array(
					')' => array(FSHL\Generator::STATE_RETURN, 0),
					'_ALL' => array('VALUE', 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-func',
				null
			),
			'COLOR' => array(
				array(
					'!HEXNUM' => array(FSHL\Generator::STATE_RETURN, 1)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-color',
				null
			),
			'COMMENT' => array(
				array(
					'_LINE' => array('COMMENT', 0),
					'_TAB' => array('COMMENT', 0),
					'*/' => array(FSHL\Generator::STATE_RETURN, 0)
				),
				FSHL\Generator::STATE_FLAG_RECURSION,
				'css-comment',
				null
			),
			'PHP' => array(
				null,
				FSHL\Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'Php'
			),
			FSHL\Generator::STATE_QUIT => array(
				null,
				FSHL\Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				null
			)
		);
	}

	/**
	 * Returns special delimiters.
	 *
	 * @return array
	 */
	public function getDelimiters()
	{
		return array(
			'FUNC' => 'preg_match(\'~[a-z]+\\s*\\(~iA\', $text, $matches, 0, $textPos)',
			'PROPERTY' => 'preg_match(\'~[-a-z]+~iA\', $text, $matches, 0, $textPos)'
		);
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return array();
	}
}
