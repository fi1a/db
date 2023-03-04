<?php

declare(strict_types=1);

namespace Fi1a\DB;

use Fi1a\DB\Adapters\AdapterInterface;
use Fi1a\DB\Queries\ActionInterface;

/**
 * БД
 */
interface DBInterface
{
    public const DEFAULT_CONNECTION = 'default';

    /**
     * Соединение с БД
     */
    public function connection(string $connectionName): AdapterInterface;

    /**
     * Добавить соединение
     *
     * @return $this
     */
    public function addConnection(AdapterInterface $adapter, string $connectionName);

    /**
     * Проверяет наличие соединения
     */
    public function hasConnection(string $connectionName): bool;

    /**
     * Удаляет соединение
     */
    public function removeConnection(string $connectionName): bool;

    /**
     * Выполняет запрос и возвращает результат запроса
     *
     * @param ActionInterface|array<string, mixed> $query
     */
    public function exec($query): bool;

    /**
     * Выполняет запрос и возвращает результат
     *
     * @param ActionInterface|array<string, mixed> $query
     *
     * @return array<array-key, array<string, string>>
     */
    public function query($query): array;
}
