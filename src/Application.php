<?php
namespace Acme\Rest;

class Application
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param HttpRequestInterface $request
     *
     * @return JsonResponse
     */
    public function run(HttpRequestInterface $request)
    {
        $requestHandler = $this->router->route($request);
        $response = $requestHandler->handle($request);
        return $response;
    }

}