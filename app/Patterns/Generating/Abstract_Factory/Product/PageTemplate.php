<?php


namespace Patterns\Generating\Abstract_Factory\Product;

/**
 * Это еще один тип Абстрактного Продукта, который описывает шаблоны целых
 * страниц.
 */
interface PageTemplate
{
    public function getTemplateString():string;
}