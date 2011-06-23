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
 * CSS language file.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lang
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Lang_Css implements Fshl_Lang
{
	/**
	 * Returns version.
	 *
	 * @return string
	 */
	public function getVersion()
	{
		return '1.12';
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
					'</' => array(Fshl_Generator::P_QUIT_STATE, 0),
					'<?php' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				0,
				null,
				null
			),
			'CLASS' => array(
				array(
					'SPACE' => array(Fshl_Generator::P_RET_STATE, 1),
					'/*' => array('COMMENT', 0),
					'{' => array(Fshl_Generator::P_RET_STATE, 1)
				),
				Fshl_Generator::PF_RECURSION,
				'css-class',
				null
			),
			'DEF' => array(
				array(
					':' => array('VALUE', 1),
					'_COUNTAB' => array('DEF', 0),
					';' => array('DEF', 1),
					'}' => array(Fshl_Generator::P_RET_STATE, 0),
					'/*' => array('COMMENT', 0),
					'!SPACE' => array('PROPERTY', 0)
				),
				Fshl_Generator::PF_RECURSION,
				'',
				null
			),
			'PROPERTY' => array(
				array(
					'_COUNTAB' => array('PROPERTY', 0),
					':' => array(Fshl_Generator::P_RET_STATE, 1),
					'}' => array(Fshl_Generator::P_RET_STATE, 1),
					'/*' => array('COMMENT', 0)
				),
				Fshl_Generator::PF_RECURSION,
				'css-property',
				null
			),
			'VALUE' => array(
				array(
					';' => array(Fshl_Generator::P_RET_STATE, 1),
					'#' => array('COLOR', 0),
					'}' => array(Fshl_Generator::P_RET_STATE, 1),
					'_COUNTAB' => array('VALUE', 0),
					'/*' => array('COMMENT', 0)
				),
				Fshl_Generator::PF_RECURSION,
				'css-value',
				null
			),
			'COLOR' => array(
				array(
					'!HEXNUM' => array(Fshl_Generator::P_RET_STATE, 1)
				),
				Fshl_Generator::PF_RECURSION,
				'css-color',
				null
			),
			'COMMENT' => array(
				array(
					'_COUNTAB' => array('COMMENT', 0),
					'*/' => array(Fshl_Generator::P_RET_STATE, 0)
				),
				Fshl_Generator::PF_RECURSION,
				'css-comment',
				null
			),
			'TO_PHP' => array(
				null,
				Fshl_Generator::PF_NEWLANG,
				'xlang',
				'PHP'
			),
			Fshl_Generator::P_QUIT_STATE => array(
				null,
				Fshl_Generator::PF_NEWLANG,
				'html-tag',
				null
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
		return array();
	}
}
