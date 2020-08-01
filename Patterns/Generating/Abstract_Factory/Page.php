<?php

namespace Patterns\Generating\Abstract_Factory;
use Patterns\Generating\Abstract_Factory\Factory\TemplateFactory;

/**
 * Клиентский код. Обратите внимание, что он принимает класс Абстрактной Фабрики
 * в качестве параметра, что позволяет клиенту работать с любым типом конкретной
 * фабрики.
 */
class Page
{
    public $title;

    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function render(TemplateFactory $factory): string
    {
        $pageTemplate = $factory->createPageTemplate();
        $renderer =$factory->getRenderer();

        return $renderer->render($pageTemplate->getTemplateString(), [
            'title' => $this->title,
            'content'=>$this->content
        ]);
    }
}