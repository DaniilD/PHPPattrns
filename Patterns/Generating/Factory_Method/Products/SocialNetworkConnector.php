<?php
namespace Patterns\Generating\Factory_Method\Products;
/**
 * Интерфейс Продукта объявляет поведения различных типов продуктов.
 */
interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost($content): void;
}