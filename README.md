statamic-entry
=================

A Statamic add-on so I can post via my iPhone/iPad. To use:

1. Install
2. Copy/create the config file with a token you can use to authenticate
3. Create complete entry in a text editor
4. Pass file (URL Encoded) to `http://<yoursite.com>/TRIGGER/entry/post?token=mytoken&data=file%20data`
	1. for a draft, pass `status=draft` as a parameter
	
## LICENSE

[MIT License](http://emd.mit-license.org)