<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Facades;

use Fi1a\DB\Facades\Schema;
use Fi1a\DB\Queries\AddIndexInterface;
use Fi1a\DB\Queries\CreateTableInterface;
use Fi1a\DB\Queries\DropIndexInterface;
use Fi1a\DB\Queries\DropTableInterface;
use PHPUnit\Framework\TestCase;

/**
 * Запросы изменяющие структуру таблицы
 */
class SchemaTest extends TestCase
{
    /**
     * Запросы изменяющие структуру таблицы
     */
    public function testFacadeCreate(): void
    {
        $this->assertInstanceOf(CreateTableInterface::class, Schema::create());
    }

    /**
     * Запросы изменяющие структуру таблицы
     */
    public function testFacadeDrop(): void
    {
        $this->assertInstanceOf(DropTableInterface::class, Schema::drop());
    }

    /**
     * Запросы добавления индекса
     */
    public function testFacadeAddIndex(): void
    {
        $this->assertInstanceOf(AddIndexInterface::class, Schema::addIndex());
    }

    /**
     * Запросы удаления индекса
     */
    public function testFacadeDropIndex(): void
    {
        $this->assertInstanceOf(DropIndexInterface::class, Schema::dropIndex());
    }
}
