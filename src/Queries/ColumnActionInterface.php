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
     * @return $this
     */
    public function column(ColumnInterface $column);
}
