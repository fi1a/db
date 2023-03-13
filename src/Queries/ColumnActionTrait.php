<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонки
 */
trait ColumnActionTrait
{
    /**
     * @var ColumnCollectionInterface
     */
    protected $columns;

    /**
     * @inheritDoc
     */
    public function column(ColumnTypeInterface $column)
    {
        $this->columns[] = $column;

        return $this;
    }
}
