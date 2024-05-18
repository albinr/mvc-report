<?php

namespace ContainerMxZuXKO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ErvjVkrService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator.ErvjVkr' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ErvjVkr'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\ApiLibraryController::apiBookIsbn' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ApiLibraryController::apiLibrary' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::createBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::deleteBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::index' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::readMany' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::readOne' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::updateBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController::updateFormBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\ApiLibraryController:apiBookIsbn' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ApiLibraryController:apiLibrary' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:createBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:deleteBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:index' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:readMany' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:readOne' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:updateBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\LibraryController:updateFormBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\ApiLibraryController::apiBookIsbn' => '?',
            'App\\Controller\\ApiLibraryController::apiLibrary' => '?',
            'App\\Controller\\LibraryController::createBook' => '?',
            'App\\Controller\\LibraryController::deleteBook' => '?',
            'App\\Controller\\LibraryController::index' => '?',
            'App\\Controller\\LibraryController::readMany' => '?',
            'App\\Controller\\LibraryController::readOne' => '?',
            'App\\Controller\\LibraryController::updateBook' => '?',
            'App\\Controller\\LibraryController::updateFormBook' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\ApiLibraryController:apiBookIsbn' => '?',
            'App\\Controller\\ApiLibraryController:apiLibrary' => '?',
            'App\\Controller\\LibraryController:createBook' => '?',
            'App\\Controller\\LibraryController:deleteBook' => '?',
            'App\\Controller\\LibraryController:index' => '?',
            'App\\Controller\\LibraryController:readMany' => '?',
            'App\\Controller\\LibraryController:readOne' => '?',
            'App\\Controller\\LibraryController:updateBook' => '?',
            'App\\Controller\\LibraryController:updateFormBook' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
