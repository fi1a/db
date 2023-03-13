<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Создание таблицы
 */
interface CreateTableInterface extends ActionInterface, TableNameActionInterface, ColumnActionInterface
{
    /**
     * Добавляет IF NOT EXISTS к запросу
     *
     * @return $this
     */
    public function ifNotExists();
}
