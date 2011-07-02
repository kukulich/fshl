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
 * Texy lexer.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class Texy implements FSHL\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'Texy';
	}

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState()
	{
		return 'SingleNewLine';
	}

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates()
	{
		return array(
			'LineBODY' => array(
				array(
					'/---' => array('BlockIN', 0),
					'\---' => array('BlockOUT', 0),
					"\n" => array('NewLineTypeSelector', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'NewLineTypeSelector' => array(
				array(
					"\n" => array('DoubleNewLine', 0),
					'!SPACE' => array('SingleNewLine', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'SingleNewLine' => array(
				array(
					'##' => array('HeaderIN', 0),
					'**' => array('HeaderIN', 0),
					'==' => array('HeaderIN', 0),
					'--' => array('HeaderIN', 0),
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'DoubleNewLine' => array(
				array(
					"\n" => array('DoubleNewLine', 0),
					'##' => array('HeaderIN', 0),
					'==' => array('HeaderIN', 0),
					'--' => array('HorizontalLine', 0),
					'- -' => array('HorizontalLine', 0),
					'**' => array('HorizontalLine', 0),
					'* *' => array('HorizontalLine', 0),
					'_ALL' => array('LineBODY', -1)
				),
				'texy-err',
				null,
				null
			),
			'HeaderIN' => array(
				array(
					'=' => array('HeaderIN', 0),
					'#' => array('HeaderIN', 0),
					'-' => array('HeaderIN', 0),
					'*' => array('HeaderIN', 0),
					"\n" => array('DoubleNewLine', 0),
					'_ALL' => array('HeaderBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hlead',
				null
			),
			'HeaderBody' => array(
				array(
					'=' => array('HeaderOUT', 0),
					'#' => array('HeaderOUT', 0),
					'-' => array('HeaderOUT', 0),
					'*' => array('HeaderOUT', 0),
					"\n" => array('DoubleNewLine', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hbody',
				null
			),
			'HeaderOUT' => array(
				array(
					"\n" => array('DoubleNewLine', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hlead',
				null
			),
			'HorizontalLine' => array(
				array(
					"\n" => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockIN' => array(
				array(
					'html' => array('BlockHTML', 0),
					'code' => array('BlockCODE', 0),
					'div' => array('BlockDUMMY', 0),
					'text' => array('BlockTEXT', 0),
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockDUMMY' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			// Text blocks
			'BlockTEXT' => array(
				array(
					"\n" => array('BlockTEXTBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockTEXTBody' => array(
				array(
					"\n" => array('BlockTEXTBodyNL', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-text',
				null
			),
			'BlockTEXTBodyNL' => array(
				array(
					'\---' => array('BlockTEXTBodyOUT', 0),
					'_ALL' => array('BlockTEXTBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-text',
				null
			),
			'BlockTEXTBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			// HTML blocks
			'BlockHTML' => array(
				array(
					"\n" => array('BlockHTMLBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockHTMLBody' => array(
				array(
					"\n" => array('BlockHTMLBodyNL', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-html',
				null
			),
			'BlockHTMLBodyNL' => array(
				array(
					'\---' => array('BlockHTMLBodyOUT', 0),
					'_ALL' => array('BlockHTMLBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-html',
				null
			),
			'BlockHTMLBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			// Code blocks
			'BlockCODE' => array(
				array(
					"\n" => array('BlockCODEBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
				null
			),
			'BlockCODEBody' => array(
				array(
					"\n" => array('BlockCODEBodyNL', 0)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-code',
				null
			),
			'BlockCODEBodyNL' => array(
				array(
					'\---' => array('BlockCODEBodyOUT', 0),
					'_ALL' => array('BlockCODEBody', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-code',
				null
			),
			'BlockCODEBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				FSHL\Generator::STATE_FLAG_NONE,
				'texy-hr',
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
