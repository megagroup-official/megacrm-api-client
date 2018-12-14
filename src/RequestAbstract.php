<?php

namespace Megagroup\MegaCrm\Api;

use Megagroup\MegaCrm\Api\Type\StructAbstract;

abstract class RequestAbstract extends StructAbstract implements RequestInterface
{

    use RequestInvokeTrait;

}
