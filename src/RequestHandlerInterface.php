<?php
namespace Acme\Rest;

interface RequestHandlerInterface
{

    /**
     * @param HttpRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(HttpRequestInterface $request);

}