<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Adapters\AdapterInterface;
use Fi1a\DB\DBInterface;
use Fi1a\DB\Queries\ActionInterface;
use Fi1a\Facade\AbstractFacade;

/**
 * БД
 *
 * @method AdapterInterface connection(?string $connectionName)
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
        return di()->get(DBInterface::class);
    }
}
