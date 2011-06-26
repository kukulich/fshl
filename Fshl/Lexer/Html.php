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
 * HTML lexer.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lexer
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Lexer_Html implements Fshl_Lexer
{
	/**
	 * Returns version.
	 *
	 * @return string
	 */
	public function getVersion()
	{
		return '1.11';
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
					'<!--' => array('COMMENT', 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'<' => array('TAG', 0),
					'&' => array('ENTITY', 0),
					'_COUNTAB' => array('OUT', 0)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'ENTITY' => array(
				array(
					';' => array('OUT', 1),
					'&' => array('OUT', 1),
					'SPACE' => array('OUT', 1)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'html-entity',
				null
			),
			'TAG' => array(
				array(
					'>' => array('OUT', 1),
					'SPACE' => array('inTAG', 0),
					'style' => array('CSS', 1),
					'STYLE' => array('CSS', 1),
					'script' => array('JAVASCRIPT', 1),
					'SCRIPT' => array('JAVASCRIPT', 1),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'html-tag',
				null
			),
			'inTAG' => array(
				array(
					'"' => array('QUOTE1', 0),
					'>' => array(Fshl_Generator::STATE_RETURN, 1),
					'\'' => array('QUOTE2', 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('inTAG', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'html-tagin',
				null
			),
			'CSS' => array(
				array(
					'"' => array('QUOTE1', 0),
					'\'' => array('QUOTE2', 0),
					'>' => array('TO_CSS', 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('inTAG', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'html-tagin',
				null
			),
			'TO_CSS' => array(
				array(
					'>' => array(Fshl_Generator::STATE_RETURN, 1)
				),
				Fshl_Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'CSS'
			),
			'JAVASCRIPT' => array(
				array(
					'"' => array('QUOTE1', 0),
					'\'' => array('QUOTE2', 0),
					'>' => array('TO_JAVASCRIPT', 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('inTAG', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'html-tagin',
				null
			),
			'TO_JAVASCRIPT' => array(
				array(
					'>' => array(Fshl_Generator::STATE_RETURN, 1)
				),
				Fshl_Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'JS'
			),
			'QUOTE1' => array(
				array(
					'"' => array(Fshl_Generator::STATE_RETURN, 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('QUOTE1', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			),
			'QUOTE2' => array(
				array(
					'\'' => array(Fshl_Generator::STATE_RETURN, 0),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('QUOTE2', 0)
				),
				Fshl_Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			),
			'COMMENT' => array(
				array(
					'-->' => array('OUT', 1),
					'<?php' => array('TO_PHP', 0),
					'<?=' => array('TO_PHP', 0),
					'<?' => array('TO_PHP', 0),
					'_COUNTAB' => array('COMMENT', 0)
				),
				Fshl_Generator::STATE_FLAG_NONE,
				'html-comment',
				null
			),
			'TO_PHP' => array(
				null,
				Fshl_Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'PHP'
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
		return array();
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
