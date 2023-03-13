<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонки
 */
trait ColumnActionTrait
{
    /**
     * @var ColumnTypeCollectionInterface
     */
    protected $columns;

    /**
     * Добавить колонку
     *
     * @param string|ColumnTypeInterface $column
     *
     * @return $this
     */
    public function column($column)
    {
        if (is_string($column)) {
            $column = ColumnType::create()->name($column)->text();
        }
        $this->columns[] = $column;

        return $this;
    }
}
