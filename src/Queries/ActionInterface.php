<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос
 */
interface ActionInterface
{
    /**
     * Тип запроса
     */
    public function getType(): string;

    /**
     * Возвращает структуру запроса
     *
     * @return array<string, mixed>
     */
    public function getStructure(): array;
}
