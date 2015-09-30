<?php
namespace Acme\Rest;

interface HttpRequestInterface
{
    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string
     */
    public function getMethod();
}