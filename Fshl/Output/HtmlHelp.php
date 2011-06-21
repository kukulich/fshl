<?php

/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2005  Juraj 'hvge' Durech

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
 */
class Fshl_Output_HtmlHelp
{
	private $last_class;
	private $close_url;
	private $help_pages;

	public function __construct()
	{
		$this->last_class = null;
		$this->close_url = null;
		$this->help_pages = array(
			"php-keyword1" 		=> '<a href="http://php.net/manual/en/langref.php">',
			"php-keyword2" 		=> '<a href="http://php.net/%s">',

			"sql-keyword1"		=> '<a href="http://dev.mysql.com/doc/mysql/search.php?q=%s">',
			"sql-keyword2"		=> '<a href="http://dev.mysql.com/doc/mysql/search.php?q=%s">',
			"sql-keyword3"		=> '<a href="http://dev.mysql.com/doc/mysql/search.php?q=%s">',
		);
	}

	public function template($word, $class)
	{
		$word = htmlEntities($word, ENT_COMPAT, 'UTF-8');

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			if($this->last_class == null)
			{
				$this->last_class = $class;
				return '<span class="'.$class.'">'.$word;
			}
			$close = $this->close_url;
			$this->close_url = '';
			$this->last_class = $class;
			if($class == null) {
				return '</span>'.$close.$word;
			}
			return '</span>'.$close.'<span class="'.$class.'">'.$word;
		}
	}

	public function template_end()
	{
		if($this->last_class != null) {
			$close = $this->close_url;
			$this->close_url = '';
			$this->last_class = null;
			return '</span>'.$close;
		} else {
			return null;
		}
	}

	public function keyword($word, $class)
	{
		$word = htmlEntities($word, ENT_COMPAT, 'UTF-8');

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			$close = $this->close_url;
			if(isset($this->help_pages[$class])) {
				$prefix = sprintf($this->help_pages[$class], $word);
				$this->close_url = '</a>';
			} else {
				$prefix = '';
				$this->close_url = '';
			}
			if($this->last_class == null)
			{
				$this->last_class = $class;
				return $prefix.'<span class="'.$class.'">'.$word;
			}
			$this->last_class = $class;
			if($class == null) {
				return '</span>'.$close.$word;
			}
			return '</span>'.$close.$prefix.'<span class="'.$class.'">'.$word;
		}
	}

}

?>