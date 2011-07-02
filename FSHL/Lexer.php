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

namespace FSHL;

/**
 * Lexer interface.
 *
 * @subpackage Lexer
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
interface Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage();

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState();

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates();

	/**
	 * Returns special delimiters.
	 *
	 * @return array
	 */
	public function getDelimiters();

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords();
}
