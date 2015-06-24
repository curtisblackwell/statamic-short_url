statamic-short_url
=================

A Statamic add-on that allows you to use/create short urls

1. Install
2. On your short domain, create a .htaccess file that takes the shortcode and redirects it to `yourrealdomain.com/TRIGGER/short_url?redirect=shortcode`. A sample line is:
```
RewriteRule ^(\w+)/?$ http://yourrealdomain.com/TRIGGER/short_url/redirect?shortcode=$1 [L]
```
3. To create a shortcode either use the API (`$this->addon('short_url')->create($url)` or the hook `yourrealdomain.com/TRIGGER/short_url?create="http://url-to-shorten.com"`
	
## LICENSE

[MIT License](http://emd.mit-license.org)