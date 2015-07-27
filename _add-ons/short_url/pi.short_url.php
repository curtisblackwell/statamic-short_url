<?php

class Plugin_short_url extends Plugin
{
    /**
     * Shorten a URL.
     * @author Curtis Blackwell
     * @param  string $url The URL to shorten.
     * @return string      The shortened URL.
     */
    public function create($url)
    {
        $url = $url ? $url : $this->fetchParam('url');
        return $this->core->create($url);
    }

    /**
     * Alias for `$this->create()`.
     * @author Curtis Blackwell
     * @return string The shortened URL.
     */
    public function index()
    {
        $url = $this->fetchParam('url');
        return $this->create($url);
    }
}
