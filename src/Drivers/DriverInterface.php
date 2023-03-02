<?php

declare(strict_types=1);

namespace Fi1a\DB\Drivers;

use Fi1a\DB\Queries\ActionInterface;

/**
 * Драйвер СУБД
 */
interface DriverInterface
{
    /**
     * Выполняет запрос и возвращает результат запроса
     */
    public function exec(ActionInterface $query): bool;

    /**
     * Выполняет запрос и возвращает результат
     *
     * @return array<array-key, string>
     */
    public function query(ActionInterface $query): array;
}
