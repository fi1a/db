<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Изменение таблицы
 */
interface AlterTableInterface extends ActionInterface, TableNameActionInterface
{
    /**
     * Удаляет колонку
     *
     * @return $this
     */
    public function dropColumn(string $column);

    /**
     * Добавить колонку
     *
     * @return $this
     */
    public function addColumn(ColumnInterface $column);

    /**
     * Изменить колонку
     *
     * @return $this
     */
    public function changeColumn(ColumnInterface $column);
}
