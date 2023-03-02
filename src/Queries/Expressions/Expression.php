<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Expressions;

/**
 * Sql выражение
 */
class Expression implements ExpressionInterface
{
    public const TYPE = 'expression';

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
