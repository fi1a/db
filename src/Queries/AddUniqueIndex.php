<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\UniqueIndex;
use Fi1a\DB\Queries\Indexes\UniqueIndexInterface;

/**
 * Добавление уникального индекса
 *
 *  @extends ActionIndex<UniqueIndexInterface>
 */
class AddUniqueIndex extends ActionIndex implements AddUniqueIndexInterface
{
    /**
     * @var UniqueIndexInterface
     */
    protected $index;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->index = new UniqueIndex();
    }
}
