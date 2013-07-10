<?php

namespace Sensio\Bundle\BuzzBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * SensioBuzzExtension.
 *
 * @author Marc Weistroff <marc.weistroff@sensio.com>
 */
class SensioBuzzExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('buzz.xml');

        $container->setParameter('buzz.client.timeout', $config['client_timeout']);
    }
}
