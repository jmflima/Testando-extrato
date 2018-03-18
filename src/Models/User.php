<?php

namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;
use Jasny\Auth\User as JasnyUser;


class User extends Model implements JasnyUser, UserInterface
{
	//Uma medida de segurança sefinindo os campos válidos
	//Mass Assignment
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password'
	];
	
	public function getId():int
	{
		return (int)$this->id;
	}
	
	public function getUserName():string{
		return $this->email;
	}
	
	public function getHashedPassword():string
	{
		return $this->password;	
	}
	
	public function onLogin()
	{
		
	}
	
	public function onLogout()
	{
		
	}
	
	public function getFullname():string
	{
		return "{$this->first_name} {$this->last_name}"; 
	}
	
	public function getEmail():string
	{
		return $this->email;
	}
	
	public function getPassword():string
	{
		return $this->password;
	}
	
	
}

