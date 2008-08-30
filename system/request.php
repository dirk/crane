<?php
class Request {
    
	function Request() {
		$this->get = $this->get();
		$this->post = $this->post();
		$this->path = $this->path();
		$this->segments = $this->segment();
	}
	
    function get($key=false) {
        if($key && Request::data($key)) {
            return Request::data($key);
        } else if($key) {
            return (isset($_GET[$key])) ? $_GET[$key] : false;
        } else {
            return array_merge($_GET, Request::data());
        }
    }
    
    function post($key=false) {
        if($key) {
            return (isset($_POST[$key])) ? $_POST[$key] : false;
        } else {
            return $_POST;
        }
    }
    
    function path() {
        return $_SERVER['REQUEST_URI'];
    }
    
    function host() {
        return $_SERVER['HTTP_HOST'];
    }
    
    function url() {
        return Request::host().Request::path();
    }
    
    function segment($i=false) {
        $segments = explode('/', Request::path());
		unset($segments[0]);
		unset($segments[count($segments)]);
        if(is_int($i)) {
            return (isset($segments[$i]) && $segments[$i] != '') ? $segments[$i] : false;
        } else {
            return $segments;
        }
    }
    
    function controller() {
        return (Request::segment(0)) ? Request::segment(0) : 'home';
    }
    
    function action() {
        return (Request::segment(1)) ? Request::segment(1) : 'index';
    }
    
    function id() {
        return (Request::segment(2)) ? Request::segment(2) : false;
    }
    
    function data($key=false) {
        $vars = array();
        foreach(Request::segment() as $data) {
            if(eregi(':', $data)) {
                foreach(explode('&', $data) as $var) {
                    $set = explode(':', $var);
                    $vars[$set[0]] = $set[1];
                }
            }
        }
        if($key) return (isset($vars[$key])) ? $vars[$key] : false;
        if(!$key) return $vars;
    }
    
    function browser() {
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $browsers = array(
            'firefox' => 'firefox',
            'msie' => 'msie',
            'opera' => 'opera',
            'safari' => 'safari'
            );
        foreach($browsers as $name => $test) {
            if(Request::isBrowser($test)) return $name;
        }
    }
    
    function isBrowser($browser) {
        return (eregi($browser, $_SERVER['HTTP_USER_AGENT'])) ? true : false;
    }
    
    function hasExtras($max=0, $session=false, $cookies=false) {
        return (count(Request::get()) > $max) ? true : false;
    }
}
?>