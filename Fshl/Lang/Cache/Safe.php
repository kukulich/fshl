<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: Lang/Safe.php
 *       Language version: 1.0
 *
 *            Target file: Lang/Cache/Safe.php
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class Fshl_Lang_Cache_Safe
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function __construct () {
	$this->version=1.0;
	$this->generator_version='0.4.11';
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>0,1=>0)));
	$this->flags=array(0=>0);
	$this->delim=array(0=>array(0=>'_COUNTAB'));
	$this->ret=1;
	$this->quit=2;
	$this->names=array(0=>'OUT',1=>'_RET',2=>'_QUIT');
	$this->data=array(0=>null);
	$this->class=array(0=>null);
	$this->keywords=null;
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

}
?>