<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Базовый запрос добавления индекса
 */
interface ActionIndexInterface extends ActionInterface
{
    /**
     * Добавить колонку
     *
     * @return $this
     */
    public function column(string $column);

    /**
     * Добавить колонки
     *
     * @param array<array-key, string> $columns
     *
     * @return $this
     */
    public function columns(array $columns);

    /**
     * Имя таблицы
     *
     * @return $this
     */
    public function table(string $tableName);
}
