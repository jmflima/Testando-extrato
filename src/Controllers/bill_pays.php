<?php

use Psr\Http\Message\ServerRequestInterface;
	
$app
	->get('/bill-pays', function() use($app){
		$view = $app->service('view.renderer');
		$repository = $app->service('bill-pay.repository');
		$auth = $app->service('autor'); //seleciona as cagetorias do usuario logado
		$bills = $repository->findByField('user_id', $auth->user()->getID());
		return $view->render('bill-pays/list.html.twig', [
			'bills' => $bills
		]);	
	}, 'bill-pays.list')
	->get('/bill-pays/new', function() use($app){
		$view = $app->service('view.renderer');
		$auth = $app->service('autor'); //seleciona as cagetorias do usuario logado
		$categoryRepository = $app->service('category-cost.repository');
		$categories = $categoryRepository->findByField('user_id', $auth->user()->getID());
		return $view->render('bill-pays/create.html.twig', ['categories' => $categories
		]);	
	}, 'bill-pays.new')
	->post('/bill-pays/store', function(ServerRequestInterface $request)
	use($app){
		$data = $request->getParsedBody();
		$repository = $app->service('bill-pay.repository');
		$categoryRepository = $app->service('category-cost.repository');
		$auth = $app->service('autor'); //seleciona as cagetorias do usuario logado
		$data['user_id'] = $auth->user()->getID();
		$data['date_lance'] = dateParse($data['date_lance']);
		$data['value'] = numberParse($data['value']);
		$data['category_cost_id'] =	$categoryRepository->findOneBy([
			'id' => $data['category_cost_id'],
			'user_id' => $auth->user()->getID()
		])->id;
		$repository->create($data);
		return $app->route('bill-pays.list');
	}, 'bill-pays.store')
	->get('/bill-pays/{id}/edit',function(ServerRequestInterface $request) 
	use($app){
		$view = $app->service('view.renderer');
		$repository = $app->service('bill-pay.repository');
		$id = $request->getAttribute('id');
		$auth = $app->service('autor'); //seleciona cagetorias do usuario logado
		$bill = $repository->findOneBy([
			'id' => $id,
			'user_id' => $auth->user()->getID()
		]);
		$categoryRepository = $app->service('category-cost.repository');
		$categories = $categoryRepository->findByField('user_id', $auth->user()->getID());
		return $view->render('bill-pays/edit.html.twig', [
			'bill' => $bill,
			'categories' => $categories
		]);
	}, 'bill-pays.edit')
	->post('/bill-pays/{id}/update',function(ServerRequestInterface $request)
	use($app){
		$repository = $app->service('bill-pay.repository');
		$categoryRepository = $app->service('category-cost.repository');
		$id = $request->getAttribute('id');
		$data = $request->getParsedBody();
		$auth = $app->service('autor'); //seleciona cagetorias do usuario logado
		$data['user_id'] = $auth->user()->getID();
		$data['date_lance'] = dateParse($data['date_lance']);
		$data['value'] = numberParse($data['value']);
		$data['category_cost_id'] =	$categoryRepository->findOneBy([
			'id' => $data['category_cost_id'],
			'user_id' => $auth->user()->getID()
		])->id;
		$repository->update([
			'id' => $id,
			'user_id' => $auth->user()->getID()
		], $data);
		return $app->route('bill-pays.list');
	}, 'bill-pays.update')
	->get('/bill-pays/{id}/show', function(ServerRequestInterface $request) 
		use($app){
		$view = $app->service('view.renderer');
		$repository = $app->service('bill-pay.repository');
		$id = $request->getAttribute('id');
		$auth = $app->service('autor'); //seleciona cagetorias do usuario logado
		$bill = $repository->findOneBy([
			'id' => $id,
			'user_id' => $auth->user()->getID()
		]);
		return $view->render('bill-pays/show.html.twig', [
			'bill' => $bill
		]);
	}, 'bill-pays.show')
	->get('/bill-pays/{id}/delete', function(ServerRequestInterface $request) 
	use($app){
		$repository = $app->service('bill-pay.repository');
        $id = $request->getAttribute('id');
		$auth = $app->service('autor'); //seleciona cagetorias do usuario logado
        $repository->delete([
			'id' => $id,
			'user_id' => $auth->user()->getID()
		]);
        return $app->route('bill-pays.list');
    }, 'bill-pays.delete');
	
