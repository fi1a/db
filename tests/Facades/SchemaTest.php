<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Facades;

use Fi1a\DB\Facades\Schema;
use Fi1a\DB\Queries\CreateTableInterface;
use PHPUnit\Framework\TestCase;

/**
 * Запросы изменяющие структуру таблицы
 */
class SchemaTest extends TestCase
{
    /**
     * Запросы изменяющие структуру таблицы
     */
    public function testFacade(): void
    {
        $this->assertInstanceOf(CreateTableInterface::class, Schema::create());
    }
}
