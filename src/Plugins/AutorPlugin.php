<?php
declare(strict_types=1);

namespace SONFin\Plugins;

use Interop\Container\ContainerInterface;
use SONFin\Autor\Autor;
use SONFin\Autor\AutorJasny;
use SONFin\ServiceContainerInterface;

class AutorPlugin implements PluginInterface
{
    
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'jasny.auth', function (ContainerInterface $container) {
                return new AutorJasny($container->get('user.repository'));
            }
        );
        $container->addLazy(
            'autor', function (ContainerInterface $container) {
                return new Autor($container->get('jasny.auth'));
            }
        );

    }
    
}
