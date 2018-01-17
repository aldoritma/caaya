<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function test($x,$exit=0)
{
	echo $res = "<pre>";
	if(is_array($x) || is_object($x)){
		echo print_r($x);
	}else{
		echo var_dump($x);
	}
	echo "</pre><hr />"; 
	if($exit==1){ die(); }
}

function auto_breakline( $str, $limit, $break = "\n" )
{
	$limit = ( int ) $limit;
	return $limit > 0
	? preg_replace(
	'/(\S{' . ( $limit + 1 ) . ',})/e',
	'wordwrap( \'\1\', ' . $limit . ', \'' . $break . '\', TRUE )',
	$str )
	: $str;
}

function clean_string($string)
{
	if($string)
	{
		$palavra = strtr($string,"ŠŒšœŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİßàáâãäåæçèéêëìíîïğñòóôõöøùúûüıÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
		$palavranova = str_replace("_", " ", $palavra);
		
		return $palavranova; 
	}
	else
	{
		return NULL;
	}
}