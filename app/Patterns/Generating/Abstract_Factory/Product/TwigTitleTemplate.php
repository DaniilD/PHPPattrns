<?php


namespace Patterns\Generating\Abstract_Factory\Product;

/**
 * Этот Конкретный Продукт предоставляет шаблоны заголовков страниц Twig.
 */
class TwigTitleTemplate implements TitleTemplate
{

    public function getTemplateString(): string
    {
        return "<h1> {{ title }} </h1>";
    }

}