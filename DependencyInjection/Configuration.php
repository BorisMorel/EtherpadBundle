<?php

namespace IMAG\EtherpadBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('imag_etherpad');

        $rootNode
            ->children()
                ->scalarNode('api_uri')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('public_uri')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
