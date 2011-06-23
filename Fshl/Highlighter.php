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
 * Highlighter.
 *
 * @category Fshl
 * @package Fshl
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Highlighter
{
	/**
	 * Version.
	 *
	 * @var string
	 */
	const VERSION = '0.4.20';

	/**
	 * CPP language.
	 *
	 * @var string
	 */
	const LANG_CPP = 'Cpp';

	/**
	 * CSS language.
	 *
	 * @var string
	 */
	const LANG_CSS = 'Css';

	/**
	 * HTML language.
	 *
	 * @var string
	 */
	const LANG_HTML = 'Html';

	/**
	 * HTML language without other languages.
	 *
	 * @var string
	 */
	const LANG_HTML_ONLY = 'HtmlOnly';

	/**
	 * Java language.
	 *
	 * @var string
	 */
	const LANG_JAVA = 'Java';

	/**
	 * Javascript language.
	 *
	 * @var string
	 */
	const LANG_JAVASCRIPT = 'Javascript';

	/**
	 * PHP language.
	 *
	 * @var string
	 */
	const LANG_PHP = 'Php';

	/**
	 * Python language.
	 *
	 * @var string
	 */
	const LANG_PYTHON = 'Python';

	/**
	 * Safe language.
	 *
	 * @var string
	 */
	const LANG_SAFE = 'Safe';

	/**
	 * SQL language.
	 *
	 * @var string
	 */
	const LANG_SQL = 'Sql';

	/**
	 * Texy language.
	 *
	 * @var string
	 */
	const LANG_TEXY = 'Texy';

	/**
	 * HTML output.
	 *
	 * @var string
	 */
	const OUTPUT_HTML = 'Html';

	/**
	 * HTML output with links to manul.
	 *
	 * @var string
	 */
	const OUTPUT_HTML_MANUAL = 'HtmlManual';

	/**
	 * No options.
	 *
	 * @var integer
	 */
	const OPTION_DEFAULT = 0x0000;

	/**
	 * Tab indentation option.
	 *
	 * @var integer
	 */
	const OPTION_TAB_INDENT = 0x0010;

	/**
	 * Line counter option.
	 *
	 * @var integer
	 */
	const OPTION_LINE_COUNTER = 0x0020;

	/**
	 * Output mode.
	 *
	 * @var Fshl_Output
	 */
	private $output = null;

	/**
	 * Options.
	 *
	 * @var integer
	 */
	private $options;

	/**
	 * Tab indent width.
	 *
	 * @var integer
	 */
	private $tabIndentWidth;

	/**
	 * List of already used langs.
	 *
	 * @var array
	 */
	private $langs = array();

	/**
	 * Actual language.
	 *
	 * @var Fshl_Lang
	 */
	private $lang = null;

	/**
	 * Table for tab indentation
	 *
	 * @var array
	 */
	private $tabs = array();

	/**
	 * States stack.
	 *
	 * @var array
	 */
	private $stack = array();

	/**
	 * Prepares highlighter.
	 *
	 * @param string $output
	 * @param integer $options
	 * @param integer $tabIndentWidth
	 */
	public function __construct($output, $options = self::OPTION_DEFAULT, $tabIndentWidth = 4)
	{
		$outputClass = 'Fshl_Output_' . $output;
		$this->output = new $outputClass();

		$this->options = $options;

		if (($this->options & self::OPTION_TAB_INDENT) && $tabIndentWidth > 0) {
			// Precalculate table for tab indentation
			$t = ' ';
			$ti = 0;
			for ($i = $tabIndentWidth; $i; $i--) {
				$this->tabs[$i % $tabIndentWidth] = array($t, $ti++);
				$t .= ' ';
			}
			$this->tabIndentWidth = $tabIndentWidth;
		} else {
			$this->options &= ~self::OPTION_TAB_INDENT;
		}
	}

	/**
	 * Highlightes string.
	 *
	 * @param string $language
	 * @param string $text
	 * @return string
	 */
	public function highlight($language, $text)
	{
		// Sets language
		$this->setLanguage((string) $language);

		// Prepares text
		$text = str_replace(array("\r\n", "\r"), "\n", (string) $text);
		$textLength = strlen($text);
		$textPos = 0;
		// @todo ???
		$text .= 'MULHOLLANDDRIVE';

		// Parses text
		$output = array();
		$maxLineWidth = 0;
		$line = 1;
		$char = 0;
		if ($this->options & self::OPTION_LINE_COUNTER) {
			// Right aligment of line counter
			$maxLineWidth = strlen(substr_count($text, "\n") + 1);
			$output[] = $this->line($line, $maxLineWidth);
		}
		$newLanguage = $language;
		$newState = $state = $this->lang->initial_state;
		$this->stack = array();

		while (true) {
			// array($transitionId, $delimiterString, $collectedString, $collectedStringLength, $delimiterLength);
			//  - transitionId - may be -1 when we are at the end of stream
			//  - delimiterString - may be -1 when we are at the end of stream
			$word = $this->lang->{'getw' . $state}($text, $textPos, $textLength);

			// Some data was collected before getw reaches the delimiter, we must output this before other processing
			if (false !== $word[2]) {
				$textPos += $word[4];
				$char += $word[4];
				$output[] = $this->template($word[2], $state);
			}

			if ($word[0] < 0) {
				// End of stream
				break;
			}

			// Processes received delimiter as string
			$prevLine = $line;
			$prevChar = $char;
			$prevTextPos = $textPos;

			$textPos += $word[3];
			$char += $word[3];

			// Adds line counter and tab indentation
			$addLine = false;
			if ("\n" === $word[1][$word[3] - 1]) {
				// Line counter
				$line++;
				$char = 0;
				if ($this->options & self::OPTION_LINE_COUNTER) {
					$addLine = true;
					$actualLine = $line;
				}
			} elseif ("\t" === $word[1] && ($this->options & self::OPTION_TAB_INDENT)) {
				// Tab indentation
				$i = $char % $this->tabIndentWidth;
				$word[1] = $this->tabs[$i][0];
				$char += $this->tabs[$i][1];
			}

			// Gets new state from transitions table
			$newState = $this->lang->trans[$state][$word[0]][Fshl_Generator::XL_DSTATE];
			if ($newState === $this->lang->ret) {
				// Returns to previous context
				// Chooses delimiter processing (second value in destination array)
				//  0 - style from current state will be applied at received delimiter
				//  1 - delimiter will be returned to input stream
				if ($this->lang->trans[$state][$word[0]][Fshl_Generator::XL_DTYPE] > 0) {
					$line = $prevLine;
					$char = $prevChar;
					$textPos = $prevTextPos;
				} else {
					$output[] = $this->template($word[1], $state);
					if ($addLine) {
						$output[] = $this->line($actualLine, $maxLineWidth);
					}
				}

				// Get state from context stack
				if ($item = $this->popState()) {
					list($newLanguage, $state) = $item;
					// If previous context was in different language, switch language too
					if ($newLanguage !== $language) {
						$this->setLanguage($newLanguage);
						$language = $newLanguage;
					}
				} else {
					$state = $this->lang->initial_state;
				}

				continue;
			}

			// Chooses mode of delimiter processing
			//  0 - style from new state will be applied at received delimiter
			//  1 - style from current state will be applied
			// -1 - delimiter must be returned to stream (back to previous position)
			$type = $this->lang->trans[$state][$word[0]][Fshl_Generator::XL_DTYPE];
			if ($type < 0) {
				// Back to stream
				$line = $prevLine;
				$char = $prevChar;
				$textPos = $prevTextPos;
			} else {
				$output[] = $this->template($word[1], $type > 0 ? $state : $newState);
				if ($addLine) {
					$output[] = $this->line($actualLine, $maxLineWidth);
				}
			}

			// Switches between languages (transition to embedded language)
			if ($this->lang->flags[$newState] & Fshl_Generator::PF_NEWLANG) {
				if ($newState === $this->lang->quit) {
					// Returns to previous language
					if ($item = $this->popState()) {
						list($newLanguage, $state) = $item;
						if ($newLanguage !== $language) {
							$this->setLanguage($newLanguage);
							$language = $newLanguage;
						}
					} else {
						$state = $this->lang->initial_state;
					}
				} else {
					// Switches to embedded language
					$newLanguage = $this->lang->data[$newState];
					$this->pushState($language, $this->lang->trans[$newState] ? $newState : $state);
					$this->setLanguage($newLanguage);
					$language = $newLanguage;
					$state = $this->lang->initial_state;
				}

				continue;
			}

			// If newState is marked with recursion flag (alias call), push current state to context stack
			if (($this->lang->flags[$newState] & Fshl_Generator::PF_RECURSION) && $state !== $newState) {
				$this->pushState($language, $state);
			}

			// Change the state
			$state = $newState;
		}

		// Adds template end
		$output[] = $this->output->template('', null);

		return implode('', $output);
	}

	/**
	 * Sets actual language.
	 *
	 * @param string $language
	 * @return Fshl_Highlighter
	 */
	private function setLanguage($language)
	{
		if (!isset($this->langs[$language])) {
			// Load new language
			$languageClass = 'Fshl_Lang_Cache_' . $language;
			if (!class_exists($languageClass)) {
				// If language doesn't exists, use minimal line counter
				$language = self::LANG_SAFE;
				$languageClass = 'Fshl_Lang_Cache_' . $language;
			}
			$this->langs[$language] = new $languageClass();
		}

		$this->lang	= $this->langs[$language];

		return $this;
	}

	/**
	 * Outputs word.
	 *
	 * @param string $word
	 * @param string $state
	 * @return string
	 */
	private function template($word, $state)
	{
		if ($this->lang->flags[$state] & Fshl_Generator::PF_KEYWORD) {
			$normalized = $this->lang->keywords[Fshl_Generator::KEYWORD_CASE_SENSITIVE] ? $word : strtolower($word);

			if (isset($this->lang->keywords[Fshl_Generator::KEYWORD_LIST][$normalized])) {
				return $this->output->keyword($word, $this->lang->keywords[Fshl_Generator::KEYWORD_CLASS] . $this->lang->keywords[Fshl_Generator::KEYWORD_LIST][$normalized]);
			}
		}

		return $this->output->template($word, $this->lang->class[$state]);
	}

	/**
	 * Outputs line.
	 *
	 * @param integer $line
	 * @param integer $maxLineWidth
	 * @return string
	 */
	private function line($line, $maxLineWidth)
	{
		return $this->output->template(str_pad($line, $maxLineWidth, ' ', STR_PAD_LEFT) . ': ', 'line');
	}

	/**
	 * Pushes state to context stack.
	 *
	 * @param string $language
	 * @param string $state
	 * @return Fshl_Highlighter
	 */
	private function pushState($language, $state)
	{
		array_unshift($this->stack, array($language, $state));
		return $this;
	}

	/**
	 * Pops state from context stack.
	 *
	 * @return array|null
	 */
	private function popState()
	{
		return array_shift($this->stack);
	}
}