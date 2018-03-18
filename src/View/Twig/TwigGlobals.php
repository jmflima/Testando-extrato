<?php

namespace SONFin\View\Twig;

use SONFin\Autor\AutorInterface;

class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
	private $auth;
	
	public function __construct(AutorInterface $auth)
	{
		$this->auth = $auth;
	}
	
	public function getGlobals()
	{
		return ['Autor' => $this->auth];
	}
}