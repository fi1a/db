<?php

declare(strict_types=1);

namespace Fi1a\DB\Drivers;

use Fi1a\DB\Queries\ActionInterface;

/**
 * Драйвер SQL СУБД
 */
interface SqlDriverInterface extends DriverInterface
{
    /**
     * Выполняет SQL запрос и возвращает результат запроса
     */
    public function execSql(string $sql): int;

    /**
     * Выполняет выражение SQL и возвращает результат
     *
     * @return array<array-key, array<string, string>>
     */
    public function querySql(string $sql): array;

    /**
     * Возвращает SQL
     */
    public function getSql(ActionInterface $query): string;
}
