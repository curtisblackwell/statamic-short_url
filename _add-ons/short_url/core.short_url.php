<?php

require_once 'vendor/ShortUrl.php';
require_once 'vendor/autoload.php';

class Core_short_url extends Core
{
	private function ensureProtocol($url) {
	    // Prepend "http://" to any link missing the HTTP protocol text.
		if (preg_match('|^https*://|', $url) === 0) {
			$url = 'http://' . $url . '/';
		}

		return $url;
	}
	public function create($url) {
		$urls = $this->storage->getYAML('urls');
		
		// put the http on it if needed
		$url = $this->ensureProtocol($url);
		
		// check to see if it exists already
		$index = count($urls) ? array_search($url, array_column($urls, 'url')) : FALSE;
		
		// if so, return existing short url
		if ($index !== FALSE) {
			return $urls[$index]['shortcode'];
		}
		
		// else, generate, store and return
		// add one here because can't encode an ID of 0, otherwise it breaks on first run
		$shortcode = ShortUrl::encode(count($urls) + 1);
		
		$urls[] = array('shortcode' => $shortcode, 'url' => $url, 'created_date' => time(), 'clicks' => 0);
		$this->storage->putYAML('urls', $urls);
		
		return $shortcode;
	}
    public function expand($shortcode) {
    	// remove the 1 we added when we created it
    	$index = ShortUrl::decode($shortcode) - 1;
    	
    	if ($index == -1) {
    		return NULL;
    	}
    	
		$urls = $this->storage->getYAML('urls');
		$url_data = &$urls[$index];
		
		$url_data['clicks']++;

		$this->storage->putYAML('urls', $urls);
		
		return $url_data['url'];
    }
}
