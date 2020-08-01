<?php

use Patterns\Generating\Abstract_Factory\Factory\PHPTemplateFactory;
use Patterns\Generating\Abstract_Factory\Factory\TwigTemplateFactory;
use Patterns\Generating\Abstract_Factory\Page;

error_reporting(E_ALL); //задает какие ошибки попадут в отчет. E_ALL - все ошибки
ini_set('display_errors', 'on'); // разрешает отображение ошибок

spl_autoload_register(function ($class){
    $classPath = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.$class.".php");
    if (file_exists($classPath) && is_readable($classPath)){
        // подключаем его, если файл имеется и мы имеем к нему доступ
        require $classPath;
    }else{
        //создать исключение!!!
        echo "Class name '{$classPath}' not found";
    }
});

$page = new Page("Simple page", "this it the body");
echo "Testing actual rendering with the PHPTemplate factory:\n";
echo $page->render(new TwigTemplateFactory());