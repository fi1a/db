<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонка
 */
interface ColumnNameInterface
{
    /**
     * Название колонки
     *
     * @return $this
     */
    public function name(string $columnName);

    /**
     * Возвращает структуру
     *
     * @return array{columnName: (string|null)}
     */
    public function getStructure(): array;

    /**
     * @return static
     */
    public static function create();
}
