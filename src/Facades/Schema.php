<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Queries\AddIndexInterface;
use Fi1a\DB\Queries\AlterTableInterface;
use Fi1a\DB\Queries\CreateTableInterface;
use Fi1a\DB\Queries\DropIndexInterface;
use Fi1a\DB\Queries\DropTableInterface;
use Fi1a\DB\Queries\SchemaInterface;
use Fi1a\Facade\AbstractFacade;

/**
 * Запросы изменяющие структуру таблицы
 *
 * @method static AlterTableInterface alter()
 * @method static CreateTableInterface create()
 * @method static DropTableInterface drop()
 * @method static AddIndexInterface addIndex()
 * @method static DropIndexInterface dropIndex()
 */
class Schema extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function factory(): object
    {
        return di()->get(SchemaInterface::class);
    }
}
