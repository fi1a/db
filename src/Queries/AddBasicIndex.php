<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\BasicIndex;
use Fi1a\DB\Queries\Indexes\BasicIndexInterface;

/**
 * Добавление индекса
 *
 * @extends ActionIndex<BasicIndexInterface>
 */
class AddBasicIndex extends ActionIndex implements AddBasicIndexInterface
{
    /**
     * @var BasicIndexInterface
     */
    protected $index;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->index = new BasicIndex();
    }

    /**
     * @inheritDoc
     */
    public function name(string $name)
    {
        $this->index->name($name);

        return $this;
    }
}
