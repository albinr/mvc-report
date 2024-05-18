<?php

namespace ContainerJKdWX1F;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getReportControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ReportController' shared autowired service.
     *
     * @return \App\Controller\ReportController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ReportController.php';

        $container->services['App\\Controller\\ReportController'] = $instance = new \App\Controller\ReportController();

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\ReportController', $container));

        return $instance;
    }
}
