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

 * ---------------------------------------------------------------------
 */
class Fshl_Helper
{
	static function getStringSource($var) {
		if(!is_string($var)) {
			return Fshl_Helper::getVarContentSource($var);
		}
		$out = null;
		for($i=0; $i<strlen($var); $i++) {
			$ch = $var[$i];
			$ich = (int)ord($ch);
			if($ich < 32 || $ich > 127) {
				// we need use escapes
				$out = null;
				for($j=0; $j<strlen($var); $j++) {
					$add = null;
					$ch = $var[$j];
					$ich = ord($ch);
					switch($ch) {
						case "\n": $add='n'; break;
						case "\t": $add='t'; break;
						case "\r": $add='r'; break;
						case "\$": $add='$'; break;
						case '"': $add='"'; break;
						case "\\": $add="\\"; break;
						default:
							if($ich < 32 || $ich > 127) {
								if($ich < 8) {
									$add='0'+ord($ch);
								} else {
									$add='x'.bin2hex($ch);
								}
							}
							break;
					}
					$out .= $add !== null ? "\\".$add : $ch;
				}
				return '"'.$out.'"';
			}
			if($ch=='\\') {
				$next = $i + 1 < strlen($var) ? $var[$i+1] : null;
				if($next !== null && $next != '\\' && $next != '\'') {
					$out .= $ch;
				} else {
					$out .= '\\\\';
				}
			} elseif ($ch=="'") {
				$out .= '\\\'';
			} else {
				$out .= $ch;
			}
		}
		return '\''.$out.'\'';
	}

	static function getVarContentSource($var)
	{
		if(is_numeric($var)) {
			return $var;
		}
		if(is_null($var)) {
			return 'null';
		}
		if(is_bool($var)) {
			return $var ? 'true' : 'false';
		}
		if(is_string($var)) {
			return Fshl_Helper::getStringSource($var);
		}
		if(is_array($var)) {
			$array = 'array(';
			$tmp = ""; $cnt = 0;
			foreach($var as $key => $value) {
				$tmp .= Fshl_Helper::getVarContentSource($key).'=>'.Fshl_Helper::getVarContentSource($value);
				$tmp .= ++$cnt < count($var) ? ',' : '';
			}
			$tmp.=')';
			return $array.$tmp;
		}
		assert(0);
		return 'Fshl_Helper::getVarContentSource error';
	}

	static function getVarSource($varname, $mixed_var) {
		return '$'.$varname."=".Fshl_Helper::getVarContentSource($mixed_var).";\n";
	}

	static function getFncSource($fncname,$param=null) {
		return "function $fncname ($param) {\n";
	}

	static function blockIndent($string, $level) {
		$tab = str_repeat("  ", $level);
		$lines = explode("\n", $string);
		$out = null;
		foreach($lines as $line) {
			$out .= $tab.$line."\n";
		}
		return $out;
	}

}

?>