<?php
namespace Acme\Rest;

class Router
{
    /**
     * @var Route[]
     */
    private $routes = [];

    /**
     * @param Route $route
     */
    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
    }

    /**
     * @param HttpRequestInterface $request
     *
     * @return ResponseInterface
     * @throws RoutingException
     */
    public function route(HttpRequestInterface $request)
    {
        foreach ($this->routes as $route) {
            if (!$route->matches($request)) {
                continue;
            }
            return $route->getRequestHandler();
        }
        throw new RoutingException(
            sprintf('No route for %s %s', mb_strtoupper($request->getMethod()), $request->getPath())
        );
    }

}