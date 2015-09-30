<?php
namespace Acme\Rest;

interface ResponseInterface
{
    /**
     * @return string
     */
    public function flush();
}