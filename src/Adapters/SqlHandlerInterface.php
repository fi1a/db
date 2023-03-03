<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

/**
 * Обработчик для Sql запроса
 */
interface SqlHandlerInterface extends HandlerInterface
{
    /**
     * Возвращает Sql
     *
     * @param array<string, mixed> $query
     */
    public function getSql(array $query): string;
}
