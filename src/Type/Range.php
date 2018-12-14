<?php

namespace Megagroup\MegaCrm\Api\Type;

/**
 * @method float getFrom()
 * @method float getTo()
 *
 * @method Range setFrom(float $from)
 * @method Range setTo(float $to)
 */
class Range extends StructAbstract
{

    /**
     * @var float
     */
    protected $from;

    /**
     * @var float
     */
    protected $to;

    protected function getProperties()
    {
        return [
            'from' => new RealNumber,
            'to' => new RealNumber,
        ];
    }

}
