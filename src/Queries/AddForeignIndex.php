<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\ForeignIndex;
use Fi1a\DB\Queries\Indexes\ForeignIndexInterface;

/**
 * Добавление внешнего ключа
 *
 * @extends ActionIndex<ForeignIndexInterface>
 */
class AddForeignIndex extends ActionIndex implements AddForeignIndexInterface
{
    /**
     * @var ForeignIndexInterface
     */
    protected $index;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->index = new ForeignIndex();
    }

    /**
     * @inheritDoc
     */
    public function name(string $name)
    {
        $this->index->name($name);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function references(array $columns)
    {
        $this->index->references($columns);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function reference(string $column)
    {
        $this->index->reference($column);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function on(string $tableName)
    {
        $this->index->on($tableName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function onDelete(string $action)
    {
        $this->index->onDelete($action);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function onUpdate(string $action)
    {
        $this->index->onUpdate($action);

        return $this;
    }
}
