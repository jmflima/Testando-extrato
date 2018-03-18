<?php

use Psr\Http\Message\ServerRequestInterface;
	
$app
	->get('/cahrts', function(ServerRequestInterface $request) use($app){
		$view = $app->service('view.renderer');
		$repository = $app->service('category.repository');
		$auth = $app->service('autor'); //seleciona as cagetorias do usuario logado
		$data = $request->getQueryParams();
		
		$dateStart = $data['date_start'] ?? (new \DateTime())->modify('-1 month');
		$dateStart = $dateStart instanceof \dateTime ? $dateStart->format('Y-m-d')
			: \DateTime::creatFromFormat('d/m/y', $dateStart)->format('Y-m-d');
		
		$dateEnd = $data['date_end'] ?? new \DateTime();
		$dateEnd = $dateEnd instanceof \dateTime ? $dateEnd->format('Y-m-d')
			: \DateTime::creatFromFormat('d/m/y', $dateEnd)->format('Y-m-d');

/*		print_r($dateStart);
		print_r($dateEnd);
		die();
*/

		$categories = $repository->sumByPeriod($dateStart, $dateEnd, $auth->user()->getId());
		
		return $view->render('cahrts.html.twig', [
			'categories' => $categories
		]);
	}, 'charts.list');
	
