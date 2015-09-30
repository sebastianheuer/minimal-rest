<?php
namespace Acme\Rest;

class Route
{
    /**
     * @var string
     */
    private $method = 'get';

    /**
     * @var string
     */
    private $path = '';

    /**
     * @var RequestHandlerInterface
     */
    private $requestHandler;

    /**
     * @param string                  $method
     * @param string                  $path
     * @param RequestHandlerInterface $handler
     */
    public function __construct($method, $path, RequestHandlerInterface $handler)
    {
        $this->method = $method;
        $this->path = $path;
        $this->requestHandler = $handler;
    }

    /**
     * @return RequestHandlerInterface
     */
    public function getRequestHandler()
    {
        return $this->requestHandler;
    }
    
    /**
     * @param HttpRequestInterface $request
     *
     * @return bool
     */
    public function matches(HttpRequestInterface $request)
    {
        return $this->method == $request->getMethod() && $request->getPath() == $this->path;
    }

}