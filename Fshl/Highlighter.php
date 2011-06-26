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
	 * CPP lexer.
	 *
	 * @var string
	 */
	const LEXER_CPP = 'Cpp';

	/**
	 * CSS lexer.
	 *
	 * @var string
	 */
	const LEXER_CSS = 'Css';

	/**
	 * HTML lexer.
	 *
	 * @var string
	 */
	const LEXER_HTML = 'Html';

	/**
	 * HTML lexer without other languages.
	 *
	 * @var string
	 */
	const LEXER_HTML_ONLY = 'HtmlOnly';

	/**
	 * Java lexer.
	 *
	 * @var string
	 */
	const LEXER_JAVA = 'Java';

	/**
	 * Javascript lexer.
	 *
	 * @var string
	 */
	const LEXER_JAVASCRIPT = 'Javascript';

	/**
	 * Minimal lexer.
	 *
	 * @var string
	 */
	const LEXER_MINIMAL = 'Minimal';

	/**
	 * PHP lexer.
	 *
	 * @var string
	 */
	const LEXER_PHP = 'Php';

	/**
	 * Python lexer.
	 *
	 * @var string
	 */
	const LEXER_PYTHON = 'Python';

	/**
	 * SQL lexer.
	 *
	 * @var string
	 */
	const LEXER_SQL = 'Sql';

	/**
	 * Texy lexer.
	 *
	 * @var string
	 */
	const LEXER_TEXY = 'Texy';

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
	 * List of already used lexers.
	 *
	 * @var array
	 */
	private $lexers = array();

	/**
	 * Actual lexer.
	 *
	 * @var Fshl_Lexer
	 */
	private $lexer = null;

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
	 * @param string $lexer
	 * @param string $text
	 * @return string
	 */
	public function highlight($lexer, $text)
	{
		// Sets lexer
		$this->setLexer((string) $lexer);

		// Prepares text
		$text = str_replace(array("\r\n", "\r"), "\n", (string) $text);
		$textLength = strlen($text);
		$textPos = 0;

		// Parses text
		$output = '';
		$maxLineWidth = 0;
		$line = 1;
		$char = 0;
		if ($this->options & self::OPTION_LINE_COUNTER) {
			// Right aligment of line counter
			$maxLineWidth = strlen(substr_count($text, "\n") + 1);
			$output .= $this->line($line, $maxLineWidth);
		}
		$newLexer = $lexer;
		$newState = $state = $this->lexer->initialState;
		$this->stack = array();

		while (true) {
			list($transitionId, $delimiter, $buffer) = $this->lexer->{'findDelimiter' . $state}($text, $textLength, $textPos);

			// Some data may be collected before getPart reaches the delimiter, we must output this before other processing
			if (false !== $buffer) {
				$bufferLength = strlen($buffer);
				$textPos += $bufferLength;
				$char += $bufferLength;
				$output .= $this->template($buffer, $state);
			}

			if (-1 === $transitionId) {
				// End of stream
				break;
			}

			// Processes received delimiter as string
			$prevLine = $line;
			$prevChar = $char;
			$prevTextPos = $textPos;

			$delimiterLength = strlen($delimiter);
			$textPos += $delimiterLength;
			$char += $delimiterLength;

			// Adds line counter and tab indentation
			$addLine = false;
			if ("\n" === $delimiter[$delimiterLength - 1]) {
				// Line counter
				$line++;
				$char = 0;
				if ($this->options & self::OPTION_LINE_COUNTER) {
					$addLine = true;
					$actualLine = $line;
				}
			} elseif ("\t" === $delimiter && ($this->options & self::OPTION_TAB_INDENT)) {
				// Tab indentation
				$i = $char % $this->tabIndentWidth;
				$delimiter = $this->tabs[$i][0];
				$char += $this->tabs[$i][1];
			}

			// Gets new state from transitions table
			$newState = $this->lexer->trans[$state][$transitionId][Fshl_Generator::STATE_DIAGRAM_INDEX_STATE];
			if ($newState === $this->lexer->returnState) {
				// Returns to previous context
				// Chooses delimiter processing (second value in destination array)
				//  0 - style from current state will be applied at received delimiter
				//  1 - delimiter will be returned to input stream
				if ($this->lexer->trans[$state][$transitionId][Fshl_Generator::STATE_DIAGRAM_INDEX_TYPE] > 0) {
					$line = $prevLine;
					$char = $prevChar;
					$textPos = $prevTextPos;
				} else {
					$output .= $this->template($delimiter, $state);
					if ($addLine) {
						$output .= $this->line($actualLine, $maxLineWidth);
					}
				}

				// Get state from context stack
				if ($item = $this->popState()) {
					list($newLexer, $state) = $item;
					// If previous context was in different lexer, switch lexer too
					if ($newLexer !== $lexer) {
						$this->setLexer($newLexer);
						$lexer = $newLexer;
					}
				} else {
					$state = $this->lexer->initialState;
				}

				continue;
			}

			// Chooses mode of delimiter processing
			//  0 - style from new state will be applied at received delimiter
			//  1 - style from current state will be applied
			// -1 - delimiter must be returned to stream (back to previous position)
			$type = $this->lexer->trans[$state][$transitionId][Fshl_Generator::STATE_DIAGRAM_INDEX_TYPE];
			if ($type < 0) {
				// Back to stream
				$line = $prevLine;
				$char = $prevChar;
				$textPos = $prevTextPos;
			} else {
				$output .= $this->template($delimiter, $type > 0 ? $state : $newState);
				if ($addLine) {
					$output .= $this->line($actualLine, $maxLineWidth);
				}
			}

			// Switches between lexers (transition to embedded language)
			if ($this->lexer->flags[$newState] & Fshl_Generator::STATE_FLAG_NEWLEXER) {
				if ($newState === $this->lexer->quitState) {
					// Returns to previous lexer
					if ($item = $this->popState()) {
						list($newLexer, $state) = $item;
						if ($newLexer !== $lexer) {
							$this->setLexer($newLexer);
							$lexer = $newLexer;
						}
					} else {
						$state = $this->lexer->initialState;
					}
				} else {
					// Switches to embedded language
					$newLexer = $this->lexer->data[$newState];
					$this->pushState($lexer, $this->lexer->trans[$newState] ? $newState : $state);
					$this->setLexer($newLexer);
					$lexer = $newLexer;
					$state = $this->lexer->initialState;
				}

				continue;
			}

			// If newState is marked with recursion flag (alias call), push current state to context stack
			if (($this->lexer->flags[$newState] & Fshl_Generator::STATE_FLAG_RECURSION) && $state !== $newState) {
				$this->pushState($lexer, $state);
			}

			// Change the state
			$state = $newState;
		}

		// Adds template end
		$output .= $this->output->template('', null);

		return $output;
	}

	/**
	 * Sets actual lexer.
	 *
	 * @param string $lexerName
	 * @return Fshl_Highlighter
	 */
	private function setLexer($lexerName)
	{
		if (!isset($this->lexers[$lexerName])) {
			// Load new lexer
			$lexerClass = 'Fshl_Lexer_Cache_' . $lexerName;
			if (!class_exists($lexerClass)) {
				$lexerDefinitionClass = 'Fshl_Lexer_' . $lexerName;
				if (class_exists($lexerDefinitionClass) && class_exists('Fshl_Generator')) {
					// Generate lexer on fly
					$generator = new Fshl_Generator($lexerName);
					$file = tempnam(sys_get_temp_dir(), 'fshl');
					file_put_contents($file, $generator->getSource());
					require_once $file;
					unlink($file);
				} else {
					// Use minimal lexer with line counter
					$lexerName = self::LEXER_MINIMAL;
					$lexerClass = 'Fshl_Lexer_Cache_' . $lexerName;
				}
			}
			$this->lexers[$lexerName] = new $lexerClass();
		}

		$this->lexer = $this->lexers[$lexerName];

		return $this;
	}

	/**
	 * Outputs word.
	 *
	 * @param string $part
	 * @param string $state
	 * @return string
	 */
	private function template($part, $state)
	{
		if ($this->lexer->flags[$state] & Fshl_Generator::STATE_FLAG_KEYWORD) {
			$normalized = Fshl_Generator::CASE_SENSITIVE === $this->lexer->keywords[Fshl_Generator::KEYWORD_INDEX_CASE_SENSITIVE] ? $part : strtolower($part);

			if (isset($this->lexer->keywords[Fshl_Generator::KEYWORD_INDEX_LIST][$normalized])) {
				return $this->output->keyword($part, $this->lexer->keywords[Fshl_Generator::KEYWORD_INDEX_CLASS] . $this->lexer->keywords[Fshl_Generator::KEYWORD_INDEX_LIST][$normalized]);
			}
		}

		return $this->output->template($part, $this->lexer->classes[$state]);
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
	 * @param string $lexer
	 * @param string $state
	 * @return Fshl_Highlighter
	 */
	private function pushState($lexer, $state)
	{
		array_unshift($this->stack, array($lexer, $state));
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
