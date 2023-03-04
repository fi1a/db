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
     * Подготавливает для запроса
     *
     * @param array<string, mixed> $query
     *
     * @return mixed
     */
    public function prepare(array $query);
}
