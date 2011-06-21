<?php
// apd_set_pprof_trace();
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2006  Juraj 'hvge' Durech

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

 * ---------------------------------------------------------------------
 * fshl.php
 *
 * main fshl parser core
 * ---------------------------------------------------------------------
 */

if(!defined('FSHL_PATH')) {
	define('FSHL_PATH', dirname(__FILE__).'/');		// thanx to martin*cohen & johno for this great hack:)
}
if(!defined('FSHL_CACHE')) {
	define ('FSHL_CACHE', FSHL_PATH.'Lang/Cache/');
}

class Fshl_Highlighter
{
	const VERSION = '0.4.20';

	const LANG_CPP = 'Cpp';
	const LANG_CSS = 'Css';
	const LANG_HTML = 'Html';
	const LANG_HTML_ONLY = 'HtmlOnly';
	const LANG_JAVA = 'Java';
	const LANG_JAVASCRIPT = 'Javascript';
	const LANG_PHP = 'Php';
	const LANG_PYTHON = 'Python';
	const LANG_SAFE = 'Safe';
	const LANG_SQL = 'Sql';
	const LANG_TEXY = 'Texy';

	const OUTPUT_HTML = 'Html';
	const OUTPUT_HTML_MANUAL = 'HtmlManual';

	CONST OPTION_DEFAULT = 0x0000;
	CONST OPTION_TAB_INDENT = 0x0010;
	CONST OPTION_LINE_COUNTER = 0x0020;


	// class variables
	var $text, $textlen, $textpos;
	var $options, $output;
	var $text_position,  $tab_indent, $tabs;
	var $line_counter, $max_line_width;

	var $out, $outf;			// final output and output fragment

	var $_trans, $_flags, $_data, $_delim, $_class, $_keywords;
	var $_ret,$_quit;

	var $lexers, $lang;			// loaded lexers and current language
	var $stack;					// parser context stack

	var $timestamp, $last_time;	// timer


	// -----------------------------------------------------------------------
	// USER LEVEL functions
	//

	// class constructor
	function __construct($output_mode, $options = self::OPTION_DEFAULT, $tab_indent_value = 4)
	{
		$this->options  = $options;
		// initialize output module
		$outClass = 'Fshl_Output_' . $output_mode;
		$this->output = new $outClass();
		// initialize tab emulation and line counter
		if($options & self::OPTION_TAB_INDENT) {
			if($tab_indent_value > 0) {
				// precalculate table for tab indent emulation
				$tab = ' ';
				$t = $tab; $ti = 0;
				for($i = $tab_indent_value; $i; $i--) {
					$this->tabs[($i) % $tab_indent_value] = array($t, $ti++);
					$t .= $tab;
				}
				$this->tab_indent = $tab_indent_value;
			} else {
				$this->tabs = null;		// disable tab indent
				$this->options &= ~self::OPTION_TAB_INDENT;
			}
		} else {
			$this->tabs = null;
		}
		$this->line_counter = $options & self::OPTION_LINE_COUNTER;
		// init defaults
		$this->text_position = array(1,0,0);		// 1 = line, 0 = char in line
		$this->max_line_width = -1;					// max line width
		$this->lexers = array();
		$this->lang = NULL;
		$this->text = NULL;
		$this->textpos = 0;
		$this->textlen = 0;
		$this->last_time = -1;
	}

	// highlight string
	//
	function & highlightString($language, $text, $offset = 0, $total_line_count = 0) {
		assert(is_string($text));
		$this->startTimer();
		// parser initialization
		$this->initText($text, $offset);
		$this->text_position = array(1,0,0);
		$this->max_line_width = 0;
		if($this->line_counter) {
			$this->text_position[2] = $total_line_count ? $total_line_count : $this->calcCounterPadding($text);
			$this->outf .= $this->output->template(str_pad('1', $this->text_position[2], ' ', STR_PAD_LEFT).': ', 'count');
		}
		// start parser
		$this->resetStack();
		$this->setLanguage($language);
		$this->parseString($language, $this->lang->initial_state);
		$this->stopTimer();
		return $this->getOut();
	}

	// highlight next string
	//
	function & highlightNextString($text, $offset = 0) {
		assert(is_string($text));
		$language = null;
		$state = null;
		if($this->popState($language, $state)) {
			// continue in parsing
			$this->startTimer();
			$this->initText($text, $offset);
			$this->setLanguage($language);
			$this->parseString($language, $state);
			$this->stopTimer();
			return $this->getOut();
		}
		return null;
	}

	function calcCounterPadding(&$text) {
		assert(is_string($text));
		$data = count_chars($text, 0);
		return isset($data[ord("\n")]) ? strlen($data[ord("\n")]+1) : 2;
	}

	function getPosition()	{ return $this->textpos; }

	function getParseTime() { return $this->last_time; }

	function isError() { return false;	}	//for shlParser class compatibility

	function getMaxLineWidth() { return $this->max_line_width; }

	function getLineCount() { return $this->text_position[0]; }

	function & getOut() {
		if(is_array($this->out)) {
			$this->out = implode('', $this->out);
		}
		return $this->out;
	}

	function isLanguage($language) {
		return file_exists(FSHL_CACHE.$language.'.php');
	}

	// ---------------------------------------------------------------------------------
	// LOW LEVEL functions
	//

	// set current language
	function setLanguage($language) {
		if(!isset($this->lexers[$language])) {
			// load new language
			$languageClass = 'Fshl_Lang_Cache_' . $language;
			if(!class_exists($languageClass)) {
				// if lexer doesn't exists use minimal line counter
				$language = self::LANG_SAFE;
				$languageClass = 'Fshl_Lang_Cache_' . $language;
			}
			$this->lexers[$language] = new $languageClass();
		}
		$this->lang		= &$this->lexers[$language];
		$this->_trans 	= &$this->lang->trans;
		$this->_flags 	= &$this->lang->flags;
		$this->_data 	= &$this->lang->data;
		//$this->_delim 	= &$this->lang->delim;		// deprecated in FSHL (will be used in debug mode?)
		$this->_class 	= &$this->lang->class;
		$this->_ret		= &$this->lang->ret;
		$this->_quit	= &$this->lang->quit;
		$this->_keywords= &$this->lang->keywords;
		// FSHL text pointers init (deprecated)
		//$this->lang->pt		= &$this->text;
		//$this->lang->pti	= &$this->textpos;
	}

	function initText(&$text, $offset) {
		$text = str_replace("\r",'',$text);	// remove MS-DOS mass!
		$this->text = &$text;
		$this->textlen = strlen($text);
		$this->text .= 'MULHOLLANDDRIVE';	// bugfixed on 1st live designia session.
		$this->textpos = $offset;
		$this->outf = null;
		$this->out = array();
	}

	//
	// main parser function
	//
	function parseString($language, $state)
	{
		$new_language = $language;
		while(1)
		{
			$getWord = 'getw'.$state;
			$word = $this->lang->$getWord($this->text, $this->textpos, $this->textlen);
			//!debug states
			//echo "state $state:{$this->lang->names[$state]}\n";
			//echo "  ".Fshl_Helper::getVarContentSource($word, true)."\n\n";

			// getWord returns: array($transition_id, $delimiter_string, $collected_string);
			//  - transition_id - may be -1 when we are at the end of stream
			//  - delimiter_string - may be -1 when we are at the end of stream
			if($word[2] !== false) {
				// some data was collected before getw reaches the delimiter,
				// we must output this fragment before other processing
				$length = $word[4];
				$this->textpos += $length;
				$this->text_position[1] += $length;
				$this->template($word[2], $state);
			}
			if($word[0] < 0) {
				break;	// we are at the end of stream, break while(1) immediately
			}
			// now we must also process received delimiter as string
			$show_number = false;
			$prev_position = $this->text_position;
			$prev_text_pos = $this->textpos;
			$length = $word[3];
			$this->textpos += $length;
			$this->text_position[1] += $length;
			// TAB INDENT and LINE COUNTER
			if($word[1][$length-1]=="\n") {
				$this->max_line_width = max($this->max_line_width, $this->text_position[1]);
				$this->text_position[0]++;
				$this->text_position[1] = 0;
				if($this->line_counter) {
					$show_number = str_pad($this->text_position[0], $this->text_position[2], ' ', STR_PAD_LEFT).': ';
				}
			} else {
				if($this->tabs && $word[1]=="\t")
				{
					$i = $this->text_position[1] % $this->tab_indent;
					$this->text_position[1] += $this->tabs[$i][1];
					$word[1] = $this->tabs[$i][0];
				}
			}
			//get new state from transitions table
			$newstate = $this->_trans[$state][$word[0]][Fshl_Generator::XL_DSTATE];
			if($newstate == $this->_ret)
			{
				// Return to previous context (wrong named as recursion?:)
				// Now we must choose delimiter processing (second value in destination array)
				// type == 0 - style from current state will be applied at received delimiter
				//         1 - delimiter will be returned to input stream
				if($this->_trans[$state][$word[0]][Fshl_Generator::XL_DTYPE]) {
					$this->text_position = $prev_position;
					$this->textpos = $prev_text_pos;
					//$show_number = false;
				} else  {
					$this->template($word[1], $state);
					if($show_number !== FALSE) {
						$this->outf .= $this->output->template($show_number, 'count');
					}
				}
				// pop state from context stack
				if($this->popState($new_language, $state)) {
					// if previous context was in different lexer, switch lexer too
					if($new_language != $language) {
						$this->setLanguage($new_language);
						$language = $new_language;
					}
				} else {
					assert(0);		// error in grammar - bad escape from recursion
					$state = $this->lang->initial_state;	// set safety state
				}
				continue;
			}
			// Now we must choose mode of delimiter processing
			// type == 0 - style from new state will be applied at received delimiter
			//         1 - style from current state will be applied
			//        -1 - delimiter must be returned to stream (back to previous position)
			$type = $this->_trans[$state][$word[0]][Fshl_Generator::XL_DTYPE];
			if($type > 0) {			//if Fshl_Generator::XL_DTYPE == 1
				$this->template($word[1], $state);
				if($show_number !== FALSE) {
					$this->outf .= $this->output->template($show_number, 'count');
				}
			} else {
				if($type < 0) {
					// back to stream
					$this->text_position = $prev_position;
					$this->textpos = $prev_text_pos;
					$show_number = false;
				} else {
					$this->template($word[1], $newstate);
					if($show_number !== FALSE) {
						$this->outf .= $this->output->template($show_number, 'count');
					}
				}
			}
			//
			// switching between lexers (transition to embedded lexer)
			//
			if($this->_flags[$newstate] & Fshl_Generator::PF_NEWLANG)
			{
				if($newstate == $this->_quit) {
					if($this->popState($new_language, $state)) {
						if($new_language != $language) {
							$this->setLanguage($new_language);
							$language = $new_language;
						}
					} else {
						$state = $this->lang->initial_state;	// fixed _QUIT in non-embedded context
					}
					continue;
				}
				$new_language = $this->_data[$newstate];
				$this->pushState($language, $this->_trans[$newstate] ? $newstate: $state);
				$this->setLanguage($new_language);
				$language = $new_language;
				$state = $this->lang->initial_state;
				continue;
			}
			//
			// if newstate is marked with recursion flag (alias call), push current state to context stack
			// Call to current state is not allowed.
			if($this->_flags[$newstate] & Fshl_Generator::PF_RECURSION)
			{
				//
				if($state != $newstate) {
					$this->pushState($language, $state);
				}
			}
			// change the state
			$state = $newstate;
		} //END while()

		// PUSH CURRENT STATE
		$this->pushState($language, $state);
		$this->outf .= $this->output->template('', null);
		$this->appendFragment();
	}

	// Reset the context stack
	function resetStack() {
		$this->stack = array();
	}

	// Push state to context stack
	function pushState($lang, $state) {
		array_unshift($this->stack, array($lang, $state));
	}

	// Pop state from context stack
	function popState(&$lang, &$state) {
		$item = array_shift($this->stack);
		if($item) {
			$lang = $item[0];
			$state = $item[1];
			return true;
		}
		return false;
	}

	//
	// Text fragmentation reduces frequency of big reallocations inside PHP
	// This function collects 8KB output chunks into array, which will be imploded in getOut() method..
	// When very very long input is processed, this may improve performance.
	//
	function appendFragment() {
		$this->out[] = $this->outf;
		$this->outf = null;
	}

	//
	// template with keywords
	//
	function template($word, $state) {
		if($this->_flags[$state] & Fshl_Generator::PF_KEYWORD) {
			if($this->_keywords[2]) {
				$word_key = $word;
			} else {
				$word_key = strtolower($word);
			}
			if(isset($this->_keywords[1][$word_key])) {
				$this->outf .= $this->output->keyword($word, $this->_keywords[0].$this->_keywords[1][$word_key]);
			} else {
				$this->outf .= $this->output->template($word, $this->_class[$state]);
			}
		} else {
			$this->outf .= $this->output->template($word, $this->_class[$state]);
		}
		if(isset($this->outf[8100])) {
			$this->appendFragment();
		}
	}

	// SelfTimer functions

	function getMicroTime()	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	function startTimer() {
		$this->timestamp = $this->getMicroTime();
	}

	function stopTimer() {
		$this->last_time = $this->getMicroTime() - $this->timestamp;
	}

}
?>