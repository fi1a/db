<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

use Fi1a\DB\Queries\ActionInterface;

/**
 * Драйвер SQL СУБД
 */
interface SqlAdapterInterface extends AdapterInterface
{
    /**
     * Выполняет SQL запрос и возвращает результат запроса
     *
     * @return int|false
     */
    public function execSql(string $sql);

    /**
     * Выполняет выражение SQL и возвращает результат
     *
     * @return array<array-key, array<string, mixed>>
     */
    public function querySql(string $sql): array;

    /**
     * Возвращает SQL
     *
     * @param ActionInterface|array<string, mixed> $query
     */
    public function getSql($query): string;
}
