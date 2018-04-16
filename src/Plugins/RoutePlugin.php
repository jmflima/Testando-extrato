<?php
declare(strict_types=1);

namespace SONFin\Plugins;

use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use SONFin\ServiceContainerInterface;
use Zend\Diactoros\ServerRequestFactory;

class RoutePlugin implements PluginInterface
{
    
    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        /*tem a fun��o de registrar as rotas da aplica��o*/
        $map = $routerContainer->getMap();
        /*tem a fun��o de identificar a rota que est� sendo acessada*/
        $matcher = $routerContainer->getMatcher();
        /*tem a fun��o de identificar a rota que est� sendo acessada*/
        $generator = $routerContainer->getGenerator();
        $request = $this->getRequest();
                
        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);
        
        $container->addLazy(
            'route', function (ContainerInterface $container) {
                $matcher = $container->get('routing.matcher');
                $request = $container->get(RequestInterface::class);
                return $matcher->match($request);    
            }
        );
    }
    
    /*Objet request estilo psr 7 passando para o matcher*/
    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory:: fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES 
        );
    }        
}
