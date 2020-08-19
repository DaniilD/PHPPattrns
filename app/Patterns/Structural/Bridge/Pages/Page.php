<?php
namespace Patterns\Structual\Bridge\Pages;

use Patterns\Structual\Bridge\Renderers\Renderer;

abstract class Page
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * Обычно Абстракция инициализируется одним из объектов Реализации.
     * @param Renderer $renderer
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Паттерн Мост позволяет динамически заменять присоединённый объект
     * Реализации.
     * @param Renderer $renderer
     */
    public function changeRenderer(Renderer $renderer):void
    {
        $this->renderer = $renderer;
    }


    /**
     * Поведение «вида» остаётся абстрактным, так как оно предоставляется только
     * классами Конкретной Абстракции.
     */
    abstract public function view():string;
}