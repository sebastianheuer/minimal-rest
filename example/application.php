<?php
namespace Acme\Rest;
require __DIR__ . '/../src/autoload.php';

$router = new Router();
$application = new Application($router);

$router->addRoute(
    new Route('get', '/', new IndexRequestHandler())
);

$response = $application->run(new HttpRequest($_SERVER));
$response->flush();
