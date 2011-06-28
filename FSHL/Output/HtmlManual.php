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

namespace FSHL\Output;

use FSHL;

/**
 * HTML output with links to manual.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class HtmlManual implements FSHL\Output
{
	/**
	 * Last used class.
	 *
	 * @var string
	 */
	private $lastClass = null;

	/**
	 * Closing tag for link.
	 *
	 * @var string
	 */
	private $closeTag = null;

	/**
	 * Urls list to manual.
	 *
	 * @var array
	 */
	private $manualUrl = array(
		'php-keyword1' => 'http://php.net/manual/en/langref.php',
		'php-keyword2' => 'http://php.net/%s',

		'sql-keyword1' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
		'sql-keyword2' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
		'sql-keyword3' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
	);

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

		if ($this->lastClass !== $class) {
			if (null !== $this->lastClass) {
				$output .= '</span>';
			}

			$output .= $this->closeTag;
			$this->closeTag = '';

			if (null !== $class) {
				$output .= sprintf('<span class="%s">', $class);
			}

			$this->lastClass = $class;
		}

		return $output . htmlspecialchars($part, ENT_COMPAT, 'UTF-8');
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
		$output = '';

		if ($this->lastClass !== $class) {
			if (null !== $this->lastClass) {
				$output .= '</span>';
			}

			$output .= $this->closeTag;
			$this->closeTag = '';

			if (null !== $class) {
				if (isset($this->manualUrl[$class])) {
					$output .= sprintf('<a href="%s">', sprintf($this->manualUrl[$class], $part));
					$this->closeTag = '</a>';
				}

				$output .= sprintf('<span class="%s">', $class);
			}

			$this->lastClass = $class;
		}

		return $output . htmlspecialchars($part, ENT_COMPAT, 'UTF-8');
	}
}