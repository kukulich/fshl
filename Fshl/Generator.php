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

namespace Fshl;

/**
 * Generator of lexer cache files.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 */
class Generator
{
	/**
	 * Version.
	 *
	 * @var string
	 */
	const VERSION = '2.0';

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
	 * Actual lexer.
	 *
	 * @var \Fshl\Lexer
	 */
	private $lexer = null;

	/**
	 * Actual lexer name.
	 *
	 * @var string
	 */
	private $lexerName;

	/**
	 * Generated source for given lexer.
	 *
	 * @var string
	 */
	private $source;

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
	 * @param \Fshl\Lexer $lexerName
	 * @throws InvalidArgumentException If the class for given lexer doesn't exist.
	 */
	public function __construct(\Fshl\Lexer $lexer)
	{
		$this->lexer = $lexer;
		$this->lexerName = $lexer->getLanguage();
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
	 * @return \Fshl\Generator
	 * @throws Exception If the file could not be saved.
	 */
	public function saveToCache()
	{
		$file = dirname(__FILE__) . '/Lexer/Cache/' . $this->lexerName . '.php';
		if (false === file_put_contents($file, $this->source)) {
			throw new RuntimeException(sprintf('Cannot save source to "%s"', $file));
		}
		return $this;
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

namespace Fshl\\Lexer\\Cache;

/**
 * Optimized and cached {$this->lexerName} lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 * @see \\Fshl\\Generator
 * @see \\Fshl\\Lexer\\{$this->lexerName}
 */
class {$this->lexerName}
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
			'SPACE' => 'preg_match(\'~^\s+~\', $part, $matches)',
			'!SPACE' => 'preg_match(\'~^\\\\S+~\', $part, $matches)',
			'ALPHA' => 'preg_match(\'~^[a-z]+~i\', $part, $matches)',
			'!ALPHA' => 'preg_match(\'~^[^a-z]+~i\', $part, $matches)',
			'ALNUM' => 'preg_match(\'~^[a-z\\\\d]+~i\', $part, $matches)',
			'!ALNUM' => 'preg_match(\'~^[^a-z\\\\d]+~i\', $part, $matches)',
			'NUMBER' => 'preg_match(\'~^\\\\d+~\', $part, $matches)',
			'!NUMBER' => 'preg_match(\'~^\\\\D+~\', $part, $matches)',
			'HEXNUM' => 'preg_match(\'~^[a-f\\\\d]+~i\', $part, $matches)',
			'!HEXNUM' => 'preg_match(\'~^[^a-f\\\\d]+~i\', $part, $matches)',
			'DOT_NUMBER' => 'preg_match(\'~^\\.\\\\d+~\', $part, $matches)',
			'!DOT_NUMBER' => '!preg_match(\'~^\\.\\\\d+~\', $part, $matches)',
			'SAFECHAR' => 'preg_match(\'~^\\\\w+~\', $part, $matches)',
			'!SAFECHAR' => 'preg_match(\'~^\\\\W+~\', $part, $matches)'
		);

		$lexerDelimiters = $this->lexer->getDelimiters();

		$conditions = '';
		foreach ($this->delimiters[$state] as $no => $delimiter) {
			if (isset($commonDelimiters[$delimiter])) {
				$delimiterSource = '_ALL' === $delimiter || '_COUNTAB' === $delimiter ? '$letter' : '$matches[0]';
				$condition = $commonDelimiters[$delimiter];
			} elseif (isset($lexerDelimiters[$delimiter])) {
				$delimiterSource = '$matches[0]';
				$condition = $lexerDelimiters[$delimiter];
			} else {
				$delimiterSource = $this->getVarValueSource($delimiter);
				if (1 === strlen($delimiter)) {
					$condition = sprintf('%s === $letter', $delimiterSource);
				} else {
					$condition = sprintf('0 === strpos($part, %s)', $delimiterSource);
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
	 * Finds delimiter for state {$stateName}.
	 *
	 * @param string \$text
	 * @param string \$textLength
	 * @param string \$textPos
	 * @return array
	 */
	public function findDelimiter{$state}(&\$text, \$textLength, \$textPos)
	{
		\$buffer = false;
		while (\$textPos < \$textLength) {
			\$part = substr(\$text, \$textPos, 10);
			\$letter = \$part[0];
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
	 * @return Generator
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
		} elseif (is_string($value) && preg_match('~[\\t\\n\\r]~', $value)) {
			$export = var_export($value, true);
			$export = str_replace(array("\t", "\n", "\r"), array('\t', '\n', '\r'), $export);
			return '"' . substr($export, 1, -1) . '"';
		} else {
			return var_export($value, true);
		}
	}
}
