<?php

declare(strict_types=1);

namespace ItechWorld\SuluWikiBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ItechWorldSuluWikiBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('highlight')
                    ->children()
                        ->scalarNode('stylesheet')
                            ->defaultValue('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/styles/atom-one-dark.min.css')
                        ->end()
                        ->scalarNode('script')
                            ->defaultValue('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js')
                        ->end()
                        ->arrayNode('languages')
                            ->scalarPrototype()->end()
                            ->defaultValue([
                                'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js',
                            ])
                        ->end()
                        ->booleanNode('copy_button')
                            ->defaultTrue()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('quote')
                    ->children()
                        ->arrayNode('icons')
                            ->scalarPrototype()->end()
                            ->defaultValue([
                                'standard' => '💬',
                                'info' => 'ℹ️',
                                'warning' => '⚠️',
                                'danger' => '❗',
                                'success' => '✅',
                            ])
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder,
    ): void {
        $container->import('../config/services.yaml');

        $highlightConfig = $config['highlight'] ?? [
            'stylesheet' => 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/styles/atom-one-dark.min.css',
            'script' => 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js',
            'languages' => [
                'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js',
            ],
            'copy_button' => true,
        ];

        $quoteConfig = $config['quote'] ?? [
            'icons' => [
                'standard' => '💬',
                'info' => 'ℹ️',
                'warning' => '⚠️',
                'danger' => '❗',
                'success' => '✅',
            ],
        ];

        $container->parameters()
            ->set('iw_sulu.highlight_stylesheet', $highlightConfig['stylesheet'])
            ->set('iw_sulu.highlight_script', $highlightConfig['script'])
            ->set('iw_sulu.highlight_languages', $highlightConfig['languages'])
            ->set('iw_sulu.highlight_copy_button', $highlightConfig['copy_button'])
            ->set('iw_sulu.quote_icons', $quoteConfig['icons']);
    }
}
