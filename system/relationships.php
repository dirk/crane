<?php
class BelongsTo {
	var $name, $parent;
	function BelongsTo($parent, $name){
		$this->parent = $parent;$this->name = $name;
	}
}

// EOF