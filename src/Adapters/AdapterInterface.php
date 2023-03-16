<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

use Fi1a\DB\Queries\ActionInterface;

/**
 * Драйвер СУБД
 */
interface AdapterInterface
{
    /**
     * Выполняет запрос
     *
     * @param ActionInterface|array<string, mixed> $query
     */
    public function exec($query): bool;

    /**
     * Выполняет запрос и возвращает результат
     *
     * @param ActionInterface|array<string, mixed> $query
     *
     * @return array<array-key, array<string, mixed>>
     */
    public function query($query): array;
}
