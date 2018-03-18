<?php

namespace SONFin\Autor;

use SONFin\Models\UserInterface;

class Autor implements AutorInterface
{
	
	private $jasnyAuth;
	
	public function __construct(AutorJasny $jasnyAuth)
	{
		$this->jasnyAuth = $jasnyAuth;
		$this->sessionStart();	
	}
	
	public function login(array $credenciais): bool
	{
		list('email' => $email, 'password' => $password) = $credenciais;
		return $this->jasnyAuth->login($email, $password) !== null;
	}
	
	public function checarLogin(): bool
	{
		return $this->user() !== null;
	}
	
	public function logout(): void	
	{
		$this->jasnyAuth->logout();
	}

	public function user(): ?UserInterface
	{
		return $this->jasnyAuth->user();
	}
		
	public function hashPassword(string $password): string
	{
		return $this->jasnyAuth->hashPassword($password);	
	}
	
	protected function sessionStart()
	{
		if (session_status() == PHP_SESSION_NONE){
			session_start();
		}
	}
	
}