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

namespace FSHL\Output;

use FSHL;

/**
 * Output formatter for Symfony console
 *
 * You will need to add corresponding styles on your applications output,
 * for example:
 *
 *      $formatter = $output->getFormatter();
 *
 *      $colors = array(
 *          'html-tag' => 'magenta',
 *          'html-tagin' => 'yellow',
 *          'html-quote' => null,
 *      );
 *
 *      foreach ($colors as $tag => $color) {
 *          $style = new OutputFormatterStyle($color, null, array());
 *          $formatter->setStyle($tag, $style);
 *      }
 *
 * @author Daniel Leech <daniel@dantleech.com>
 * @license http://fshl.kukulich.cz/#license
 */
class SymfonyConsole implements FSHL\Output
{
	/**
	 * Last used class.
	 *
	 * @var string
	 */
	private $lastStyle = null;

	/**
	 * Outputs a template part.
	 *
	 * @param string $part
	 * @param string $class
	 * @return string
	 */
	public function template($part, $class)
	{
		$output = '';

		if ($this->lastStyle !== $class) {
			if (null !== $this->lastStyle) {
				$output .= '</' . $this->lastStyle . '>';
			}
			if (null !== $class) {
				$output .= '<' . $class . '>';
			}

			$this->lastStyle = $class;
		}

		return $output . $part;
	}

	/**
	 * Outputs a keyword.
	 *
	 * @param string $part
	 * @param string $class
	 * @return string
	 */
	public function keyword($part, $class)
    {
        return $output;
		$output = '';

		if ($this->lastStyle !== $class) {
			if (null !== $this->lastStyle) {
				$output .= '</' . $this->lastStyle . '>';
			}
			if (null !== $class) {
				$output .= '<' . $this->lastStyle . '>';
			}

			$this->lastStyle = $class;
		}

		return $output . $part;
	}
}
