<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Facades;

use Fi1a\DB\Facades\Query;
use Fi1a\DB\Queries\InsertInterface;
use PHPUnit\Framework\TestCase;

/**
 * Запрос
 */
class QueryTest extends TestCase
{
    /**
     * Запросы изменяющие структуру таблицы
     */
    public function testFacadeInsert(): void
    {
        $this->assertInstanceOf(InsertInterface::class, Query::insert());
    }
}
