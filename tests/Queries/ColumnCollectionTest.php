<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\Column;
use Fi1a\DB\Queries\ColumnCollection;
use PHPUnit\Framework\TestCase;

/**
 * Коллекция колонок
 */
class ColumnCollectionTest extends TestCase
{
    /**
     * Структура
     */
    public function testGetStructure(): void
    {
        $collection = new ColumnCollection();
        $collection[] = Column::create()->name('column1');
        $collection[] = Column::create()->name('column2');
        $this->assertCount(2, $collection);
        $this->assertEquals([
            [
                'columnName' => 'column1',
                'type' => 'integer',
                'params' => null,
                'nullable' => false,
                'default' => null,
                'unique' => null,
                'primary' => null,
                'index' => null,
                'foreign' => null,
                'rename' => null,
            ],
            [
                'columnName' => 'column2',
                'type' => 'integer',
                'params' => null,
                'nullable' => false,
                'default' => null,
                'unique' => null,
                'primary' => null,
                'index' => null,
                'foreign' => null,
                'rename' => null,
            ],
        ], $collection->getStructure());
    }

    /**
     * Исключение при не соответствии типов
     */
    public function testCollectionException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $collection = new ColumnCollection();
        $collection[] = $this;
    }
}
