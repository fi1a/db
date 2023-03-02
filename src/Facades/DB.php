<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Drivers\DriverInterface;
use Fi1a\DB\Queries\ActionInterface;
use Fi1a\Facade\AbstractFacade;
use stdClass;

/**
 * БД
 *
 * @method DriverInterface connection(?string $connectionName)
 * @method bool exec(ActionInterface $query)
 * @method array query(ActionInterface $query)
 */
class DB extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function factory(): object
    {
        return new stdClass();
    }
}
