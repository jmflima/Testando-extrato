<?php

namespace SONFin\Autor;

use Jasny\Auth\Sessions;
use Jasny\Auth\User;
use SONFin\Repository\RepositoryInterface;

class AutorJasny extends \Jasny\Auth
{
	use Sessions;
	
	private $repository;
	
	public function __construct(RepositoryInterface $repository)
	{
		$this->repository = $repository;	
	}
	
	public function fetchUserById($id)
	{
		return $this->repository->find($id, false);
	}
	
	public function fetchUserByUserName($username)
	{
		return $this->repository->findByField('email', $username)[0];
	}
	
	
}