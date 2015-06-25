<?php

class Hooks_short_url extends Hooks
{
	public function control_panel__add_routes() {
		$app = \Slim\Slim::getInstance();
		$core = $this->core;

		$app->get('/short-urls', function() use ($app, $core) {
			authenticateForRole('admin');
			doStatamicVersionCheck($app);

			$template_list = array("short-urls-overview");
			Statamic_View::set_templates(array_reverse($template_list), __DIR__ . '/templates');

			$data = $core->getOverviewData();

			$app->render(null, array('route' => 'short-urls', 'app' => $app) + $data);

		})->name('short-urls');
	}

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
