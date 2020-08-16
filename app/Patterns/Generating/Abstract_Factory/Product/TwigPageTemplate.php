<?php


namespace Patterns\Generating\Abstract_Factory\Product;

/**
 * Вариант шаблонов страниц Twig.
 */
class TwigPageTemplate extends BasePageTemplate
{

    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();
        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content">{{ content }}</article>
        </div>
        HTML;
    }
}