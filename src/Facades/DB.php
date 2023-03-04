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
 * @method static AdapterInterface connection(?string $connectionName)
 * @method static DBInterface addConnection(AdapterInterface $adapter, string $connectionName)
 * @method static bool hasConnection(string $connectionName)
 * @method static bool removeConnection(string $connectionName)
 * @method static bool exec(ActionInterface $query)
 * @method static array query(ActionInterface $query)
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
