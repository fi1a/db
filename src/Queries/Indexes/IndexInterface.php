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
    public function column(string $name);

    /**
     * Добавить колонки
     *
     * @param array<array-key, string> $names
     *
     * @return $this
     */
    public function columns(array $names);

    /**
     * Имя таблицы
     *
     * @return $this
     */
    public function table(string $tableName);
}
