<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос
 */
interface ActionInterface
{
    /**
     * Возвращает структуру запроса
     *
     * @return array<string, mixed>
     */
    public function getStructure(): array;
}
