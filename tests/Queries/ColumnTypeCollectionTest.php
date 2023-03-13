<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\ColumnType;
use Fi1a\DB\Queries\ColumnTypeCollection;
use PHPUnit\Framework\TestCase;

/**
 * Коллекция колонок
 */
class ColumnTypeCollectionTest extends TestCase
{
    /**
     * Структура
     */
    public function testGetStructure(): void
    {
        $collection = new ColumnTypeCollection();
        $collection[] = ColumnType::create()->name('column1');
        $collection[] = ColumnType::create()->name('column2');
        $this->assertCount(2, $collection);
        $this->assertEquals([
            [
                'columnName' => 'column1',
                'type' => 'integer',
                'params' => null,
            ],
            [
                'columnName' => 'column2',
                'type' => 'integer',
                'params' => null,
            ],
        ], $collection->getStructure());
    }

    /**
     * Исключение при не соответствии типов
     */
    public function testCollectionException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $collection = new ColumnTypeCollection();
        $collection[] = $this;
    }
}
