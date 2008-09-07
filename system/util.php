<?php
// Utility function. Nowhere else to put it.
function starts_with($string, $start){
	if(substr($string, 0, strlen($start)) == $start){
		return true;
	}else{
		return false;
	}
}
function ends_with($string, $end){
	if(substr($string, strlen($string) - strlen($end)) == $end){
		return true;
	}else{
		return false;
	}
}
function def_param($parameter, $default){
	if(is_null($parameter)){
		return $default;
	}else{
		return $parameter;
	}
}