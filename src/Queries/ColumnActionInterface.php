<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонки
 */
interface ColumnActionInterface
{
    /**
     * Добавить колонку
     *
     * @param ColumnTypeInterface|string $column
     *
     * @return $this
     */
    public function column($column);
}
