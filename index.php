<?PHP

/**
 *  ChassisPHP - A PHP framework designed for CMS
 *
 * @package ChassisPHP
 * @author  Roger Creasy <roger@chassisPHP.com>
 */

// Initializes the autoloader generated by composer

    $loader = require 'vendor/autoload.php';
    $loader->register();

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Lib\Framework\Core;
    use Lib\Framework\Router;

    $request = Request::createFromGlobals();                 

    // Use the Core to bootstrap an app
    $app = new Core($request);


    $app->addRoute('GET','/', function () {
            return new Response('This is the home page!');
        }
    );
    $app->addRoute('GET', '/about', function ()
    {
        return new Response('This is the about page!');
    });
    $app->addRoute('GET', '/test', function ()
    {
        return new Response('Roger\'s test page?');
    });
    $app->addRoute('GET', '/errors/404', function ()
    {
        return new Response('Dude - there aint no setch page<br>That\'s a 404');
    });
    $response = $app->dispatch();
    
    echo $response;
