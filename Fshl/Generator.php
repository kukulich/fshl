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
 * Generator of lexer cache files.
 *
 * @category Fshl
 * @package Fshl
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Generator
{
	/**
	 * Version.
	 *
	 * @var string
	 */
	const VERSION = '0.4.11';

	/**
	 * State to return back.
	 *
	 * @var string
	 */
	const STATE_RETURN = '_RETURN';

	/**
	 * State to quit current state.
	 *
	 * @var string
	 */
	const STATE_QUIT = '_QUIT';

	/**
	 * Default state flag.
	 *
	 * @var integer
	 */
	const STATE_FLAG_NONE = 0;

	/**
	 * State flag for keyword.
	 *
	 * @var integer
	 */
	const STATE_FLAG_KEYWORD = 0x0001;

	/**
	 * State flag for recursion.
	 *
	 * @var integer
	 */
	const STATE_FLAG_RECURSION = 0x0004;

	/**
	 * State flag for new language.
	 *
	 * @var integer
	 */
	const STATE_FLAG_NEWLEXER = 0x0008;

	/**
	 * Array index for state diagram.
	 *
	 * @var integer
	 */
	const STATE_INDEX_DIAGRAM = 0;

	/**
	 * Array index for state flags.
	 *
	 * @var integer
	 */
	const STATE_INDEX_FLAGS = 1;

	/**
	 * Array index for state class.
	 *
	 * @var integer
	 */
	const STATE_INDEX_CLASS = 2;

	/**
	 * Array index for state data.
	 *
	 * @var integer
	 */
	const STATE_INDEX_DATA = 3;

	/**
	 * Array index for state in state diagram.
	 *
	 * @var integer
	 */
	const STATE_DIAGRAM_INDEX_STATE = 0;

	/**
	 * Array index for type in state diagram.
	 *
	 * @var integer
	 */
	const STATE_DIAGRAM_INDEX_TYPE = 1;

	/**
	 * Array index for keyword class.
	 *
	 * @var interger
	 */
	const KEYWORD_INDEX_CLASS = 0;

	/**
	 * Array index for list of keywords.
	 *
	 * @var interger
	 */
	const KEYWORD_INDEX_LIST = 1;

	/**
	 * Array index for information if keywords are case-sensitive.
	 *
	 * @var interger
	 */
	const KEYWORD_INDEX_CASE_SENSITIVE = 2;

	/**
	 * Flag case-sensitive.
	 *
	 * @var boolean
	 */
	const CASE_SENSITIVE = true;

	/**
	 * Flag case-insensitive.
	 *
	 * @var boolean
	 */
	const CASE_INSENSITIVE = false;

	/**
	 * Generated source for given lexer.
	 *
	 * @var string
	 */
	private $source;

	/**
	 * Actual lexer name.
	 *
	 * @var string
	 */
	private $lexerName;

	/**
	 * Actual lexer.
	 *
	 * @var Fshl_Lexer
	 */
	private $lexer = null;

	/**
	 * List of CSS classes of actual lexer.
	 *
	 * @var array
	 */
	private $classes = array();

	/**
	 * List of states.
	 *
	 * @var array
	 */
	private $states = array();

	/**
	 * List of flags for all states.
	 *
	 * @var array
	 */
	private $flags = array();

	/**
	 * Data for all states.
	 *
	 * @var array
	 */
	private $data = array();

	/**
	 * List of delimiters
	 *
	 * @var array
	 */
	private $delimiters = array();

	/**
	 * Transitions table.
	 *
	 * @var array
	 */
	private $trans = array();

	/**
	 * Initializes generator for given lexer.
	 *
	 * @param string $lexerName
	 * @throws InvalidArgumentException If the class for given lexer doesn't exist.
	 */
	public function __construct($lexerName)
	{
		$this->lexerName = (string) $lexerName;
		$lexerClass = 'Fshl_Lexer_' . $this->lexerName;
		if (!class_exists($lexerClass)) {
			throw new InvalidArgumentException(sprintf('Missing class for lexer %s', $this->lexerName));
		}

		$this->lexer = new $lexerClass();
		$this->source = $this->generate();
	}

	/**
	 * Returns generated source.
	 *
	 * @return string
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Saves generated source to lexer cache file.
	 *
	 * @throws Exception If the file has not been saved.
	 */
	public function saveToCache()
	{
		$file = dirname(__FILE__) . '/Lexer/Cache/' . $this->lexerName . '.php';
		if (false === file_put_contents($file, $this->source)) {
			throw new RuntimeException(sprintf('Cannot save source to "%s"', $file));
		}
	}

	/**
	 * Generates source.
	 *
	 * @return string
	 */
	private function generate()
	{
		$this->optimize();

		$constructor = '';
		$constructor .= $this->getVarSource('$this->version', self::VERSION . '/' . $this->lexer->getVersion());
		$constructor .= $this->getVarSource('$this->trans', $this->trans);
		$constructor .= $this->getVarSource('$this->initialState', $this->states[$this->lexer->getInitialState()]);
		$constructor .= $this->getVarSource('$this->returnState', $this->states[self::STATE_RETURN]);
		$constructor .= $this->getVarSource('$this->quitState', $this->states[self::STATE_QUIT]);
		$constructor .= $this->getVarSource('$this->flags', $this->flags);
		$constructor .= $this->getVarSource('$this->data', $this->data);
		$constructor .= $this->getVarSource('$this->classes', $this->classes);
		$constructor .= $this->getVarSource('$this->keywords', $this->lexer->getKeywords());

		$functions = '';
		foreach ($this->delimiters as $state => $delimiter) {
			if (null !== $delimiter) {
				$functions .= $this->generateState($state);
			}
		}

		return <<<SOURCE
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
 * Optimized and cached {$this->lexerName} lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lexer
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 * @see Fshl_Generator
 * @see Fshl_Lexer_{$this->lexerName}
 */
class Fshl_Lexer_Cache_{$this->lexerName}
{
	/**
	 * Generator version/lexer version.
	 *
	 * @var string
	 */
	public \$version;

	/**
	 * Transitions table.
	 *
	 * @var array
	 */
	public \$trans;

	/**
	 * Id of initial state.
	 *
	 * @var integer
	 */
	public \$initialState;

	/**
	 * Id of return state.
	 *
	 * @var integer
	 */
	public \$returnState;

	/**
	 * Id of quit state.
	 *
	 * @var integer
	 */
	public \$quitState;

	/**
	 * List of flags for all states.
	 *
	 * @var array
	 */
	public \$flags;

	/**
	 * Data for all states.
	 *
	 * @var array
	 */
	public \$data;

	/**
	 * List of CSS classes.
	 *
	 * @var array
	 */
	public \$classes;

	/**
	 * List of keywords.
	 *
	 * @var array
	 */
	public \$keywords;

	/**
	 * Initializes lexer.
	 */
	public function __construct()
	{
{$constructor}
	}
{$functions}
}
SOURCE;
	}

	/**
	 * Generates state code.
	 *
	 * @param integer $state
	 * @return string
	 */
	private function generateState($state)
	{
		// Delimiter => Condition
		static $commonDelimiters = array(
			'_ALL' => 'true',
			// Line counter & tab indent
			'_COUNTAB' => '"\\t" === $letter || "\\n" === $letter',
			'SPACE' => 'preg_match(\'~^\\\\s$~\', $letter)',
			'!SPACE' => 'preg_match(\'~^\\\\S$~\', $letter)',
			'ALPHA' => 'preg_match(\'~^[a-z]$~i\', $letter)',
			'!ALPHA' => 'preg_match(\'~^[^a-z]$~i\', $letter)',
			'ALNUM' => 'preg_match(\'~^[a-z\\\\d]$~i\', $letter)',
			'!ALNUM' => 'preg_match(\'~^[^a-z\\\\d]$~i\', $letter)',
			'NUMBER' => 'preg_match(\'~^\\\\d$~\', $letter)',
			'!NUMBER' => 'preg_match(\'~^\\\\D$~\', $letter)',
			'HEXNUM' => 'preg_match(\'~^[a-f\\\\d]$~i\', $letter)',
			'!HEXNUM' => 'preg_match(\'~^[^a-f\\\\d]$~i\', $letter)',
			// '.N' where N is number
			'DOT_NUMBER' => '\'.\' === $letter && preg_match(\'~^\\\\d$~\', $text[$textPos + 1])',
			'!DOT_NUMBER' => '\'.\' !== $letter || preg_match(\'~^\\\\D$~\', $text[$textPos + 1])',
			'SAFECHAR' => 'preg_match(\'~^\\\\w$~i\', $letter)',
			'!SAFECHAR' => 'preg_match(\'~^\\\\W$~i\', $letter)'
		);

		$lexerDelimiters = $this->lexer->getDelimiters();

		$conditions = '';
		foreach ($this->delimiters[$state] as $no => $delimiter) {
			if (isset($commonDelimiters[$delimiter])) {
				$delimiterSource = '$letter';
				$condition = $commonDelimiters[$delimiter];
			} elseif (isset($lexerDelimiters[$delimiter])) {
				$delimiterSource = '$matches[0]';
				$condition = $lexerDelimiters[$delimiter];
			} else {
				$delimiterSource = $this->getVarValueSource($delimiter);
				if (1 === strlen($delimiter)) {
					$condition = sprintf('%s === $letter', $delimiterSource);
				} else {
					$condition = sprintf('$textPos === strpos($text, %s, $textPos)', $delimiterSource);
				}
			}

			$conditions .= <<<CONDITION
			if ($condition) {
				return array({$no}, {$delimiterSource}, \$buffer);
			}

CONDITION;
		}

		$stateName = array_search($state, $this->states);
		return <<<STATE

	/**
	 * Parses state {$stateName}.
	 *
	 * @param string \$text
	 * @param string \$textLength
	 * @param string \$textPos
	 * @return array
	 */
	public function getPart{$state}(&\$text, \$textLength, \$textPos)
	{
		\$buffer = false;
		while (\$textPos < \$textLength) {
			\$letter = \$text[\$textPos];
{$conditions}
			\$buffer .= \$letter;
			\$textPos++;
		}
		return array(-1, -1, \$buffer);
	}

STATE;
	}

	/**
	 * Optimizes lexer definition.
	 *
	 * @return Fshl_Generator
	 * @throws RuntimeException If the lexer definition is wrong.
	 */
	private function optimize()
	{
		$i = 0;
		foreach (array_keys($this->lexer->getStates()) as $stateName) {
			if (self::STATE_QUIT === $stateName) {
				continue;
			}
			$this->states[$stateName] = $i;
			$i++;
		}
		$this->states[self::STATE_RETURN] = $i++;
		$this->states[self::STATE_QUIT] = $i++;

		foreach ($this->lexer->getStates() as $stateName => $state) {
			$stateId = $this->states[$stateName];

			$this->classes[$stateId] = $state[self::STATE_INDEX_CLASS];
			$this->flags[$stateId] = $state[self::STATE_INDEX_FLAGS];
			$this->data[$stateId] = $state[self::STATE_INDEX_DATA];

			if (is_array($state[self::STATE_INDEX_DIAGRAM])) {
				$i = 0;
				foreach ($state[self::STATE_INDEX_DIAGRAM] as $delimiter => $trans) {
					$transName = $trans[self::STATE_DIAGRAM_INDEX_STATE];
					if (!isset($this->states[$transName])) {
						throw new RuntimeException(sprintf('Unknown state in transition %s [%s] => %s', $stateName, $delimiter, $transName));
					}
					$this->delimiters[$stateId][$i] = $delimiter;
					$trans[self::STATE_DIAGRAM_INDEX_STATE] = $this->states[$transName];
					$this->trans[$stateId][$i] = $trans;
					$i++;
				}
			} else {
				$this->delimiters[$stateId] = null;
				$this->trans[$stateId] = null;
			}
		}

		if (!isset($this->states[$this->lexer->getInitialState()])) {
			throw new RuntimeException(sprintf('Unknown initial state "%s"', $this->lexer->getInitialState()));
		}

		return $this;
	}

	/**
	 * Returns variable source.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return string
	 */
	private function getVarSource($name, $value)
	{
		return sprintf("\t\t%s = %s;\n", $name, $this->getVarValueSource($value));
	}

	/**
	 * Returns variable value source.
	 *
	 * @param mixed $value
	 * @param integer $level
	 * @return string
	 */
	private function getVarValueSource($value, $level = 0)
	{
		if (is_array($value)) {
			$tmp = '';
			$line = 0;
			$total = 0;
			foreach ($value as $k => $v) {
				if ($line > 25) {
					$tmp .= ",\n\t\t" . str_repeat("\t", $level);
					$line = 0;
				} elseif (0 !== $total) {
					$tmp .= ', ';
				}
				$tmp .= $this->getVarValueSource($k, $level + 1) . ' => ' . $this->getVarValueSource($v, $level + 1);

				$line++;
				$total++;
			}
			return "array(\n\t\t\t" . str_repeat("\t", $level) . $tmp . "\n" . str_repeat("\t", $level) . "\t\t)";
		}
		return var_export($value, true);
	}
}