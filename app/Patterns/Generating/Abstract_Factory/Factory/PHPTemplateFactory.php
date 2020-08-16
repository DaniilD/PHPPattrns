<?php


namespace Patterns\Generating\Abstract_Factory\Factory;
use Patterns\Generating\Abstract_Factory\Product\PHPTemplatePageTemplate;
use Patterns\Generating\Abstract_Factory\Product\PHPTemplateRenderer;
use Patterns\Generating\Abstract_Factory\Product\PHPTemplateTitleTemplate;
use Patterns\Generating\Abstract_Factory\Product\TitleTemplate;
use Patterns\Generating\Abstract_Factory\Product\PageTemplate;
use Patterns\Generating\Abstract_Factory\Product\TemplateRenderer;
/**
 * А эта Конкретная Фабрика создает шаблоны PHPTemplate.
 */
class PHPTemplateFactory implements TemplateFactory
{

    public function createTitleTemplate(): TitleTemplate
    {
        return new PHPTemplateTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new PHPTemplatePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}