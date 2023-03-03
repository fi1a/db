<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Название таблицы
 */
interface TableNameActionInterface
{
    /**
     * Установить название таблицы
     *
     * @return $this
     */
    public function name(string $tableName);
}
