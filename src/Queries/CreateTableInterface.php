<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Создание таблицы
 */
interface CreateTableInterface extends ActionInterface, TableNameActionInterface
{
    /**
     * Добавить колонку
     *
     * @return $this
     */
    public function column(ColumnInterface $column);
}
