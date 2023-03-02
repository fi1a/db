<?php

declare(strict_types=1);

namespace Fi1a\DB\Facades;

use Fi1a\DB\Queries\DeleteInterface;
use Fi1a\DB\Queries\InsertInterface;
use Fi1a\DB\Queries\SelectInterface;
use Fi1a\DB\Queries\UpdateInterface;
use Fi1a\Facade\AbstractFacade;
use stdClass;

/**
 * Запрос
 *
 * @method SelectInterface select()
 * @method DeleteInterface delete()
 * @method UpdateInterface update()
 * @method InsertInterface insert()
 */
class Query extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function factory(): object
    {
        return new stdClass();
    }
}
