<?php

class API_short_url extends API
{
    public function create($url) {
    	return $this->core->create($url);
    }
    
    public function expand($shortcode) {
    	return $this->core->expand($shortcode);
    }
}