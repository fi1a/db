<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

/**
 * Обработчик для запроса
 */
interface HandlerInterface
{
    /**
     * @param array<string, mixed> $query
     */
    public function validate(array $query): void;

    /**
     * Выполняет запрос
     *
     * @param array<string, mixed> $query
     */
    public function exec(array $query): bool;

    /**
     * Выполняет запрос и возвращает результат
     *
     * @param array<string, mixed> $query
     *
     * @return array<array-key, string>
     */
    public function query(array $query): array;
}
