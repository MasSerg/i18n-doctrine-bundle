<?php

namespace masserg\I18nDoctrineBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\Config\Definition\Processor,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\Loader;

/**
 * @author
 */
class massergI18nDoctrineExtension extends Extension
{
    /**
     *
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('masserg_i18n_doctrine.manager_registry', $config['manager_registry']);
        
        $container->setParameter('masserg_i18n_doctrine.translatableTrait', $config['translatableTrait']);
        $container->setParameter('masserg_i18n_doctrine.translationTrait', $config['translationTrait']);
        $container->setParameter('masserg_i18n_doctrine.translatableFetchMode', $config['translatableFetchMode']);
        $container->setParameter('masserg_i18n_doctrine.translationFetchMode', $config['translationFetchMode']);
        $container->setParameter('masserg_i18n_doctrine.isRecursive', $config['isRecursive']);

        // ORM
        if ('doctrine' === $config['manager_registry']) {
            $container->setAlias('masserg_i18n_doctrine.object_manager', 'doctrine.orm.entity_manager');
            $container->setParameter('masserg_i18n_doctrine.listener.controller.class', 'masserg\I18nDoctrineBundle\Doctrine\ORM\EventListener\ControllerListener');
            $container->setParameter('masserg_i18n_doctrine.listener.doctrine.class', 'masserg\I18nDoctrineBundle\Doctrine\ORM\EventListener\DoctrineListener');

        // ODM MongoDB
        } elseif ('doctrine_mongodb' === $config['manager_registry']) {
            $container->setAlias('masserg_i18n_doctrine.object_manager', 'doctrine.odm.document_manager');
            $container->setParameter('masserg_i18n_doctrine.listener.controller.class', 'masserg\I18nDoctrineBundle\Doctrine\ODM\EventListener\ControllerListener');
            $container->setParameter('masserg_i18n_doctrine.listener.doctrine.class', 'masserg\I18nDoctrineBundle\Doctrine\ODM\EventListener\DoctrineListener');
        }
    }

}
