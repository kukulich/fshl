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

namespace Fshl\Lexer;

use Fshl;

/**
 * CSS lexer.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class Css implements Fshl\Lexer
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
	 * Returns lexer version.
	 *
	 * @return string
	 */
	public function getVersion()
	{
		return '2.0';
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
					'{' => array('DEF', 0),
					'.' => array('CLASS', 0),
					'/*' => array('COMMENT', 0),
					'</' => array(Fshl\Generator::STATE_QUIT, 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'CLASS' => array(
				array(
					'SPACE' => array(Fshl\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0),
					'{' => array(Fshl\Generator::STATE_RETURN, 1)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'css-class',
				null
			),
			'DEF' => array(
				array(
					':' => array('VALUE', 1),
					'_COUNTAB' => array('DEF', 0),
					';' => array('DEF', 1),
					'}' => array(Fshl\Generator::STATE_RETURN, 0),
					'/*' => array('COMMENT', 0),
					'PROPERTY' => array('PROPERTY', 0)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'',
				null
			),
			'PROPERTY' => array(
				array(
					'_COUNTAB' => array('PROPERTY', 0),
					':' => array(Fshl\Generator::STATE_RETURN, 1),
					'}' => array(Fshl\Generator::STATE_RETURN, 1),
					'/*' => array('COMMENT', 0)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'css-property',
				null
			),
			'VALUE' => array(
				array(
					';' => array(Fshl\Generator::STATE_RETURN, 1),
					'#' => array('COLOR', 0),
					'}' => array(Fshl\Generator::STATE_RETURN, 1),
					'_COUNTAB' => array('VALUE', 0),
					'/*' => array('COMMENT', 0)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'css-value',
				null
			),
			'COLOR' => array(
				array(
					'!HEXNUM' => array(Fshl\Generator::STATE_RETURN, 1)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'css-color',
				null
			),
			'COMMENT' => array(
				array(
					'_COUNTAB' => array('COMMENT', 0),
					'*/' => array(Fshl\Generator::STATE_RETURN, 0)
				),
				Fshl\Generator::STATE_FLAG_RECURSION,
				'css-comment',
				null
			),
			'TO_PHP' => array(
				null,
				Fshl\Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'Php'
			),
			Fshl\Generator::STATE_QUIT => array(
				null,
				Fshl\Generator::STATE_FLAG_NEWLEXER,
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
			'PROPERTY' => 'preg_match(\'~^[-a-z]+~i\', $part, $matches)'
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
