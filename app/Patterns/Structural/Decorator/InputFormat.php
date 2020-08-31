<?php
namespace app\Patterns\Structual\Decorator;

/**
 * Интерфейс Компонента объявляет метод фильтрации, который должен быть
 * реализован всеми конкретными компонентами и декораторами.
 */
interface InputFormat
{
    public function formatText(string $text): string;
}