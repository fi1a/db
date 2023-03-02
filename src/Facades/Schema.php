<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Queries\AddIndexInterface;
use Fi1a\DB\Queries\AlterTableInterface;
use Fi1a\DB\Queries\CreateTableInterface;
use Fi1a\DB\Queries\DropIndexInterface;
use Fi1a\DB\Queries\DropTableInterface;
use Fi1a\Facade\AbstractFacade;
use stdClass;

/**
 * Запросы изменяющие структуру таблицы
 *
 * @method AlterTableInterface alter()
 * @method CreateTableInterface create()
 * @method DropTableInterface drop()
 * @method AddIndexInterface addIndex()
 * @method DropIndexInterface dropIndex()
 */
class Schema extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function factory(): object
    {
        return new stdClass();
    }
}
