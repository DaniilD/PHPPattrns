<?php


namespace app\Patterns\Structual\Decorator;

/**
 * Этот Конкретный Декоратор удаляет все теги HTML из данного текста.
 */
class PlainTextFilter extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}