<?php
namespace Acme\Rest;

class HttpRequest implements HttpRequestInterface
{
    /**
     * @var array
     */
    private $server = [];

    /**
     * @param array  $server
     */
    public function __construct(array $server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return parse_url($this->server['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return mb_strtolower($this->server['REQUEST_METHOD']);
    }

}