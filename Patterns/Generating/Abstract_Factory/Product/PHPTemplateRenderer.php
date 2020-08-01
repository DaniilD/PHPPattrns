<?php


namespace Patterns\Generating\Abstract_Factory\Product;

/**
 * Отрисовщик шаблонов PHPTemplate. Оговорюсь, что эта реализация очень простая,
 * если не примитивная. В реальных проектах используйте `eval` с
 * осмотрительностью, т.к. неправильное использование этой функции может
 * привести к дырам безопасности.
 */
class PHPTemplateRenderer implements TemplateRenderer
{

    public function render(string $templateString, array $arguments = []): string
    {
        extract($arguments);

        ob_start();
        eval("?>".$templateString."<?php");
        $result = ob_get_contents();
        ob_get_clean();

        return $result;
    }
}