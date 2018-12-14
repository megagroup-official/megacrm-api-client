<?php

namespace Megagroup\MegaCrm\Api;

class Error
{

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string[]
     */
    private $path;

    public function __construct($code, $message, array $path = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->path = $path;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string[]
     */
    public function getPath()
    {
        return $this->path;
    }

}
