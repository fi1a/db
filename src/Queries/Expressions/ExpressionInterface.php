<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Expressions;

/**
 * Выражение
 */
interface ExpressionInterface
{
    /**
     * Возвращает тип выражения
     */
    public function getType(): string;
}
