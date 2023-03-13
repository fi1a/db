<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Queries\DeleteInterface;
use Fi1a\DB\Queries\InsertInterface;
use Fi1a\DB\Queries\QueryInterface;
use Fi1a\DB\Queries\SelectInterface;
use Fi1a\DB\Queries\UpdateInterface;
use Fi1a\Facade\AbstractFacade;

/**
 * Запрос
 *
 * @method static SelectInterface select()
 * @method static DeleteInterface delete()
 * @method static UpdateInterface update()
 * @method static InsertInterface insert()
 */
class Query extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function factory(): object
    {
        return di()->get(QueryInterface::class);
    }
}
