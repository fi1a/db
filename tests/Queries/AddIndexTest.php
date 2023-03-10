<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AddBasicIndexInterface;
use Fi1a\DB\Queries\AddForeignIndexInterface;
use Fi1a\DB\Queries\AddIndex;
use Fi1a\DB\Queries\AddPrimaryIndexInterface;
use Fi1a\DB\Queries\AddUniqueIndexInterface;
use PHPUnit\Framework\TestCase;

/**
 * Добавление индекса
 */
class AddIndexTest extends TestCase
{
    /**
     * Внешний ключ
     */
    public function testForeign(): void
    {
        $query = new AddIndex();
        $this->assertInstanceOf(AddForeignIndexInterface::class, $query->foreign());
    }

    /**
     * Уникальный ключ
     */
    public function testUnique(): void
    {
        $query = new AddIndex();
        $this->assertInstanceOf(AddUniqueIndexInterface::class, $query->unique());
    }

    /**
     * Первичный ключ
     */
    public function testPrimary(): void
    {
        $query = new AddIndex();
        $this->assertInstanceOf(AddPrimaryIndexInterface::class, $query->primary());
    }

    /**
     * Индекс
     */
    public function testIndex(): void
    {
        $query = new AddIndex();
        $this->assertInstanceOf(AddBasicIndexInterface::class, $query->index());
    }
}
