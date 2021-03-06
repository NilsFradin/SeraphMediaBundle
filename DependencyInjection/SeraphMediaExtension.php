<?php

namespace Seraph\Bundle\MediaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SeraphMediaExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');
        $loader->load('twig.yaml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configs = $this->processConfiguration($configuration, $container->getExtensionConfig($this->getAlias()));
        $config = array(
            "orm" =>
                ["resolve_target_entities" =>
                    [
                        'Seraph\Bundle\MediaBundle\Model\UserInterface' => $configs['user_class'],
                        'Seraph\Bundle\MediaBundle\Model\GroupInterface' =>  $configs['group_class']
                    ]
                ]
        );

        if (!isset($configs['upload_folder'])){
            $container->setParameter('seraph_upload_folder', '/uploads/');
        }else{
            $container->setParameter('seraph_upload_folder', $configs['upload_folder']);
        }

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('vich_uploader.yaml');

        $container->prependExtensionConfig('doctrine', $config);
    }
}