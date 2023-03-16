<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Условия
 */
interface WhereInterface extends WhereActionInterface
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

    /**
     * @param string|ExpressionInterface|WhereInterface $column
     * @param mixed $value
     *
     * @return static
     */
    public static function create($column, ?string $operation = null, $value = null);
}
