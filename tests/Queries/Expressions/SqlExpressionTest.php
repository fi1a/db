<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries\Expressions;

use Fi1a\DB\Queries\Expressions\SqlExpression;
use PHPUnit\Framework\TestCase;

/**
 * Sql выражение
 */
class SqlExpressionTest extends TestCase
{
    /**
     * Sql выражение
     */
    public function testGetSql(): void
    {
        $sqlExpression = new SqlExpression('COUNT(`id`) as count');
        $this->assertEquals('COUNT(`id`) as count', $sqlExpression->getSql());
        $this->assertEquals('COUNT(`id`) as count', (string) $sqlExpression);
    }
}
