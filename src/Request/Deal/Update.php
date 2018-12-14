<?php

namespace Megagroup\MegaCrm\Api\Request\Deal;

class Update extends Create
{

    public function getMethod()
    {
        return 'PATCH';
    }

}
