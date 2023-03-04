<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\Column;
use Fi1a\DB\Queries\CreateTable;
use PHPUnit\Framework\TestCase;

/**
 * Создание таблицы
 */
class CreateTableTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new CreateTable();
        $query->name('tableName')
            ->ifNotExists()
            ->column(Column::create()->name('column1'))
            ->column(Column::create()->name('column2'));
        $this->assertEquals([
            'type' => 'createTable',
            'tableName' => 'tableName',
            'ifNotExists' => true,
            'columns' => [
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
            ],
        ], $query->getStructure());
    }
}
