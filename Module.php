<?php

namespace ZfcTwig;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ServiceProviderInterface,
    ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return array(
            'aliases' => array(),
            'factories' => array(
                'TwigEnvironment'   => 'ZfcTwig\Service\EnvironmentFactory',
                'TwigViewRenderer'  => 'ZfcTwig\Service\ViewRendererFactory',
                'TwigViewStrategy'  => 'ZfcTwig\Service\ViewStrategyFactory',
                'TwigViewResolver'  => 'ZfcTwig\Service\ViewResolverFactory',
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}