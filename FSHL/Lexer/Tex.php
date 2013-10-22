<?php

/**
 * FSHL 2.1.0                                  | Fast Syntax HighLighter |
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
 */

namespace FSHL\Lexer;

use FSHL;
use FSHL\Generator;

/**
 * TEX lexer.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011-2012 Jaroslav Hanslík
 * @license http://fshl.kukulich.cz/#license
 */
class Tex implements FSHL\Lexer {

	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage() {
		return 'Tex';
	}

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState() {
		return 'OUT';
	}

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates() {
		return array(
			'OUT' => array(
				array(
					'$' => array('MATH', Generator::NEXT),
					'\\' => array('FUNC', Generator::NEXT),
					'{' => array('ATTR1', Generator::NEXT),
					'[' => array('ATTR2', Generator::NEXT),
					'%' => array('COMMENT', Generator::NEXT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
				),
				Generator::STATE_FLAG_NONE,
				'tex-out',
				null
			),
			'MATH' => array(
				array(
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					'$' => array(Generator::STATE_RETURN, Generator::CURRENT),
				),
				Generator::STATE_FLAG_RECURSION,
				'tex-math',
				null
			),
			'FUNC' => array(
				array(
					'!ALNUM_' => array(Generator::STATE_RETURN, Generator::BACK),

				),
				Generator::STATE_FLAG_RECURSION,
				'tex-func',
				null
			),
			'ATTR1' => array(
				array(
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					'}' => array(Generator::STATE_RETURN, Generator::CURRENT)
				),
				Generator::STATE_FLAG_RECURSION,
				'tex-attr1',
				null
			),
			'ATTR2' => array(
				array(
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					']' => array(Generator::STATE_RETURN, Generator::CURRENT),
				),
				Generator::STATE_FLAG_RECURSION,
				'tex-attr2',
				null
			),
			'COMMENT' => array(
				array(
					'LINE' => array(Generator::STATE_RETURN, Generator::BACK),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
				),
				Generator::STATE_FLAG_RECURSION,
				'tex-comment',
				null
			),
		);
	}

	/**
	 * Returns special delimiters.
	 *
	 * @return array
	 */
	public function getDelimiters() {
		return array();
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords() {
		return array();
	}
}
