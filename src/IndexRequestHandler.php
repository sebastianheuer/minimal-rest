<?php
namespace Acme\Rest;

class IndexRequestHandler implements RequestHandlerInterface
{
    /**
     * @param HttpRequestInterface $request
     * @returns JsonResponse
     */
    public function handle(HttpRequestInterface $request)
    {
        return new JsonResponse(200, ['message' => 'Hello World']);
    }

}