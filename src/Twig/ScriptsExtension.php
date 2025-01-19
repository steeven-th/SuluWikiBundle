<?php

declare(strict_types=1);

namespace ItechWorld\SuluWikiBundle\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFunction;

class ScriptsExtension extends AbstractExtension implements GlobalsInterface
{
    public function __construct(
        private readonly Environment $environment,
        private readonly string $highlightStylesheet,
        private readonly string $highlightScript,
        private readonly array $highlightLanguages,
        private readonly bool $highlightCopyButton,
        private readonly array $quoteIcons,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('it_sulu_wiki_scripts', [$this, 'wikiScripts'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('it_sulu_wiki_default_css', [$this, 'defaultCss'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function wikiScripts(): ?string
    {
        return $this->environment->render('@ItechWorldSuluWiki/scripts.html.twig');
    }

    public function defaultCss(): ?string
    {
        return $this->environment->render('@ItechWorldSuluWiki/default_css.html.twig');
    }

    public function getGlobals(): array
    {
        return [
            'highlight_stylesheet' => $this->highlightStylesheet,
            'highlight_script' => $this->highlightScript,
            'highlight_languages' => $this->highlightLanguages,
            'highlight_copy_button' => $this->highlightCopyButton,
            'quote_icons' => $this->quoteIcons,
        ];
    }
}
