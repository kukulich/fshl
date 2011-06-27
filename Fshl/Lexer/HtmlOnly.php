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
 * HTML lexer without other languages.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class HtmlOnly implements Fshl\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'HtmlOnly';
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
					'<!--' => array('COMMENT', 0),
					'<' => array('TAG', 0),
					'&' => array('ENTITY', 0),
					'_COUNTAB' => array('OUT', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'ENTITY' => array(
				array(
					';' => array('OUT', 1),
					'&' => array('OUT', 1),
					'SPACE' => array('OUT', 1)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-entity',
				null
			),
			'TAG' => array(
				array(
					'>' => array('OUT', 1),
					'SPACE' => array('inTAG', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-tag',
				null
			),
			'inTAG' => array(
				array(
					'"' => array('QUOTE1', 0),
					'>' => array('OUT', 1),
					'_COUNTAB' => array('inTAG', 0),
					'\'' => array('QUOTE2', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			),
			'QUOTE1' => array(
				array(
					'"' => array('inTAG', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-quote',
				null
			),
			'QUOTE2' => array(
				array(
					'\'' => array('inTAG', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-quote',
				null
			),
			'COMMENT' => array(
				array(
					'-->' => array('OUT', 1),
					'_COUNTAB' => array('COMMENT', 0)
				),
				Fshl\Generator::STATE_FLAG_NONE,
				'html-comment',
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
