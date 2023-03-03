<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\Column;
use PHPUnit\Framework\TestCase;

/**
 * Колонка
 */
class ColumnTest extends TestCase
{
    /**
     * Название колонки
     */
    public function testName(): void
    {
        $column = Column::create()->name('column1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * INTEGER
     */
    public function testInteger(): void
    {
        $column = Column::create()->name('column1')->integer();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
        ], $column->getStructure());
    }
}
