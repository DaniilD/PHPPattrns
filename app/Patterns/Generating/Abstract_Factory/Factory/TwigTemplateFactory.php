<?php


namespace Patterns\Generating\Abstract_Factory\Factory;
use Patterns\Generating\Abstract_Factory\Product\TemplateRenderer;
use Patterns\Generating\Abstract_Factory\Product\TitleTemplate;
use Patterns\Generating\Abstract_Factory\Product\TwigPageTemplate;
use Patterns\Generating\Abstract_Factory\Product\TwigRenderer;
use Patterns\Generating\Abstract_Factory\Product\TwigTitleTemplate;
use Patterns\Generating\Abstract_Factory\Product\PageTemplate;

/**
 * Каждая Конкретная Фабрика соответствует определённому варианту (или
 * семейству) продуктов.
 *
 * Эта Конкретная Фабрика создает шаблоны Twig.
 */
class TwigTemplateFactory implements TemplateFactory
{

    public function createTitleTemplate(): TitleTemplate
    {
        return new TwigTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new TwigPageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new TwigRenderer();
    }
}