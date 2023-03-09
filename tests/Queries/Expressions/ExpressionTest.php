<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries\Expressions;

use Fi1a\DB\Queries\Expressions\Expression;
use PHPUnit\Framework\TestCase;

/**
 * Выражение
 */
class ExpressionTest extends TestCase
{
    /**
     * Выражение
     */
    public function testGetType(): void
    {
        $expression = new Expression();
        $this->assertEquals(Expression::TYPE, $expression->getType());
    }
}
