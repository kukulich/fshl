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
 * Cache file for language Safe.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lang
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 * @see Fshl_Generator
 * @see Fshl_Lang_Safe
 */
class Fshl_Lang_Cache_Safe
{
	/**
	 * Generator version/language version.
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
	 * Initializes language.
	 */
	public function __construct()
	{
		$this->version = '0.4.11/1.0';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 0, 1 => 0
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 1;
		$this->quitState = 2;
		$this->flags = array(
			0 => 0
		);
		$this->data = array(
			0 => NULL
		);
		$this->classes = array(
			0 => NULL
		);
		$this->keywords = array(
			
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
		$start = $textPos;
		while ($textPos < $textLength) {
			$letter = $text[$textPos];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $textPos - $start, $buffer, 1);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, -1, $buffer, -1);
	}

}