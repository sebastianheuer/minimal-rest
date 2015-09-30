<?php
namespace Acme\Rest;

/**
 * @codeCoverageIgnore
 */
class ErrorHandler
{
    /**
     *
     */
    public function register()
    {
        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
    }

    /**
     * @param \Exception $e
     */
    public function handleException(\Exception $e)
    {
        $code = $e->getCode() >= 400 ? $e->getCode() : 500;
        $exceptionData = [
            'error' => [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ]
        ];
        http_response_code($code);
        echo json_encode($exceptionData, JSON_PRETTY_PRINT);
        exit(1);
    }

    /**
     * @param int    $errno
     * @param string $errstr
     * @param string $errfile
     * @param int    $errline
     *
     * @throws RestException
     */
    public function handleError($errno, $errstr, $errfile, $errline)
    {
        throw new RestException(sprintf('Error: %s in %s on line %d', $errstr, $errfile, $errline), $errno);
    }
}