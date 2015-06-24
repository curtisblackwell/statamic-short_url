<?php

class Hooks_short_url extends Hooks
{
    public function short_url__create() {
    	$url = Request::get('url');
    	
    	echo($this->core->create($url));
    }

    public function short_url__expand() {
    	$shortcode = Request::get('shortcode');
    	
    	echo($this->core->expand($shortcode));
    }

    public function short_url__redirect() {
    	$shortcode = Request::get('shortcode');
    	
    	$url = $this->core->expand($shortcode);
    	
    	if ($url != NULL) {
	    	URL::redirect($url);
	    }
    }
}
