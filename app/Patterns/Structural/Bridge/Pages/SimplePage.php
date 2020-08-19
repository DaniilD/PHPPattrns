<?php


namespace Patterns\Structual\Bridge\Pages;

use Patterns\Structual\Bridge\Renderers\Renderer;

/**
 * Эта Конкретная Абстракция создаёт простую страницу.
 */
class SimplePage extends Page
{

    protected $title;
    protected $content;

    public function __construct(Renderer $renderer, string $title, string $content)
    {
        parent::__construct($renderer);
        $this->title = $title;
        $this->content = $content;
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content),
            $this->renderer->renderFooter()
        ]);
    }
}