<?php

namespace Megagroup\MegaCrm\Api\Exception;

use Megagroup\MegaCrm\Api\Error;
use Throwable;

class ResponseException extends Exception
{

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * ResponseException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Error[]        $errors
     * @param Throwable|null $previous
     */
    public function __construct(
        $message = "",
        $code = 0,
        $errors = null,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
    }

    /**
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return $this->errors !== null;
    }

}
