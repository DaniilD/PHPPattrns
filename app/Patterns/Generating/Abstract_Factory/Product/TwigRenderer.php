<?php


namespace Patterns\Generating\Abstract_Factory\Product;

/**
 * Отрисовщик шаблонов Twig.
 */
class TwigRenderer implements TemplateRenderer
{

    public function render(string $templateString, array $arguments = []): string
    {
        return "Отрисовал Twig xoxo";
    }
}