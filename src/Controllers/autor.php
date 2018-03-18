<?php

use Psr\Http\Message\ServerRequestInterface;
	
$app
	->get('/login', function(ServerRequestInterface $request) use($app){
		$view = $app->service('view.renderer');
		return $view->render('autor/login.html.twig');
	}, 'autor.show_login_form')
	->post('/login', function(ServerRequestInterface $request)use($app){
		$view = $app->service('view.renderer');
		$auth = $app->service('autor');
		$data = $request->getParsedBody();
		$result = $auth->login($data);
		if(!$result){
			return $view->render('autor/login.html.twig');
		}
		return $app->route('category-costs.list');
	}, 'autor.login')
	->get('/logout', function() use($app){
		$auth = $app->service('autor')->logout();
		return $app->route('autor.show_login_form');
	}, 'autor.logout');
	
$app->before(function() use($app){
	$route = $app->service('route');
	$auth = $app->service('autor');
	$routesWhiteList = [
		'autor.show_login_form',
		'autor.login'
	];
	
	if(!in_array($route->name, $routesWhiteList) && !$auth->checarLogin()){
		return $app->route('autor.show_login_form');
	}	
	
});