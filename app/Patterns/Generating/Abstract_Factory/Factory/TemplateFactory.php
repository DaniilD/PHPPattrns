<?php
namespace Patterns\Generating\Abstract_Factory\Factory;



use Patterns\Generating\Abstract_Factory\Product\PageTemplate;
use Patterns\Generating\Abstract_Factory\Product\TitleTemplate;
use Patterns\Generating\Abstract_Factory\Product\TemplateRenderer;

/**
 * Интерфейс Абстрактной фабрики объявляет создающие методы для каждого
 * определённого типа продукта.
 */
interface TemplateFactory
{
    public function createTitleTemplate():TitleTemplate;

    public function createPageTemplate():PageTemplate;

    public function getRenderer():TemplateRenderer;
}