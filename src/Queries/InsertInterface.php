<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос на вставку
 */
interface InsertInterface extends ActionInterface, TableNameActionInterface, ExecutableInterface
{
    /**
     * Перечисление колонок
     *
     * @param array<array-key, string> $columns
     *
     * @return $this
     */
    public function columns(array $columns);

    /**
     * Значение одной строки
     *
     * @param array<string, mixed> $row
     *
     * @return $this
     */
    public function row(array $row);

    /**
     * Значения множества строк
     *
     * @param array<array-key, array<string, mixed>> $rows
     *
     * @return $this
     */
    public function rows(array $rows);
}
