<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Индекс
 */
interface IndexInterface
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

    /**
     * Возвращает структуру
     *
     * @return array{tableName: string|null, columns: array<array-key, string>}
     */
    public function getStructure(): array;
}
