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

// Security
function strip_tags_attributes($sSource, $aAllowedTags = array()){
	$aDisabledAttributes = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavaible', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragdrop', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterupdate', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmoveout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	if (empty($aDisabledAttributes)) return strip_tags($sSource, implode('', $aAllowedTags));
	return preg_replace('/\s(' . implode('|', $aDisabledAttributes) . ').*?([\s\>])/', '\\2', preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")[ \\t\\n]*=[ \\t\\n]*[\"\'][\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($sSource, implode('', $aAllowedTags))) );
}
function db_clean($values){
	if ($values === null) {
		$values = 'NULL';
  }
  else if (is_bool($values)) {
		$values = $values ? 1 : 0;
  }
  else if (!is_numeric($values)) {
		$values = mysql_real_escape_string($values);
		$values = '"' . $values . '"';
  }
	return $values;
}