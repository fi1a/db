<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\PrimaryIndex;
use Fi1a\DB\Queries\Indexes\PrimaryIndexInterface;

/**
 * Запрос добавления первичного ключа
 *
 * @extends ActionIndex<PrimaryIndexInterface>
 */
class AddPrimaryIndex extends ActionIndex implements AddPrimaryIndexInterface
{
    /**
     * @var PrimaryIndexInterface
     */
    protected $index;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->index = new PrimaryIndex();
    }

    /**
     * @inheritDoc
     */
    public function increments()
    {
        $this->index->increments();

        return $this;
    }
}
