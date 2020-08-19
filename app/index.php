<?php

use Patterns\Generating\Abstract_Factory\Factory\PHPTemplateFactory;
use Patterns\Generating\Abstract_Factory\Factory\TwigTemplateFactory;
//use Patterns\Generating\Abstract_Factory\Page;
use Patterns\Generating\Builder\MysqlQueryBuilder;
use Patterns\Generating\Builder\PostgresQueryBuilder;
use Patterns\Generating\Builder\SQLQueryBuilder;
use Patterns\Generating\Factory_Method\Factory\FacebookPoster;
use Patterns\Generating\Factory_Method\Factory\LinkedInPoster;
use Patterns\Generating\Factory_Method\Factory\SocialNetworkPoster;
use Patterns\Generating\Factory_Method\Products\SocialNetworkConnector;
use Patterns\Structual\Bridge\Pages\Page;
use Patterns\Structual\Bridge\Pages\SimplePage;
use Patterns\Structual\Bridge\Renderers\HTMLRenderer;
use Patterns\Structual\Bridge\Renderers\JsonRenderer;

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


/**
 * Abstract Factory Client Code
 */
/*$page = new Page("Simple page", "this it the body");
echo "Testing actual rendering with the PHPTemplate factory:\n";
echo $page->render(new TwigTemplateFactory());*/


/**
 * Builder Client Code
 */
/*function clientCode(SQLQueryBuilder $queryBuilder){
    $query = $queryBuilder
        ->select("user", ["name", "email", "password"])
        ->where("age", 18, ">")
        ->where("age", 30,"<")
        ->limit(10, 20)
        ->getSQL();
    

    echo $query;
}

echo "Testing MySQL query builder:\n";
clientCode(new MysqlQueryBuilder);

echo "\n\n";

echo "Testing PostgresSQL query builder:\n";
clientCode(new PostgresQueryBuilder);*/


/**
 *Factory Method Client Code
 */
/**
 * Клиентский код может работать с любым подклассом SocialNetworkPoster, так как
 * он не зависит от конкретных классов.
 * @param SocialNetworkPoster $creator
 */
/*function clientCode(SocialNetworkPoster $creator){
    $creator->post("Hello");
    $creator->post("I had a large humburger this morning!");
}
/**
 * На этапе инициализации приложение может выбрать, с какой социальной сетью оно
 * хочет работать, создать объект соответствующего подкласса и передать его
 * клиентскому коду.
 */
/*echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster("john_smith", "******"));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster("john_smith@example.com", "******"));*/

/**
 *Bridge Client Code
 */

/**
 * Клиентский код имеет дело только с объектами Абстракции.
 * @param Page $page
 */
function clientCode(Page $page)
{
    // ...

    echo $page->view();

    // ...
}

/**
 * Клиентский код может выполняться с любой предварительно сконфигурированной
 * комбинацией Абстракция+Реализация.
 */
$HTMLRenderer = new HTMLRenderer();
$JSONRenderer = new JsonRenderer();

$page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
echo "HTML view of a simple content page:\n";
clientCode($page);
echo "\n\n";

/**
 * При необходимости Абстракция может заменить связанную Реализацию во время
 * выполнения.
 */
$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, rendered with the same client code:\n";
clientCode($page);
echo "\n\n";