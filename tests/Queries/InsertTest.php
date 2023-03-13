<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\ColumnType;
use Fi1a\DB\Queries\Insert;
use PHPUnit\Framework\TestCase;

/**
 * Запрос на вставку
 */
class InsertTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new Insert();

        $query->name('tableName')
            ->column(ColumnType::create()->integer()->name('column1'))
            ->column(ColumnType::create()->integer()->name('column2'))
            ->rows([['column1' => 1, 'column2' => 2], ['column1' => 3, 'column2' => 4]]);

        $this->assertEquals([
            'type' => 'insert',
            'tableName' => 'tableName',
            'columns' => [
                [
                    'columnName' => 'column1',
                    'type' => 'integer',
                    'params' => [
                        'unsigned' => false,
                    ],
                ],
                [
                    'columnName' => 'column2',
                    'type' => 'integer',
                    'params' => [
                        'unsigned' => false,
                    ],
                ],
            ],
            'rows' => [['column1' => 1, 'column2' => 2], ['column1' => 3, 'column2' => 4]],
        ], $query->getStructure());
    }

    /**
     * Возвращает структуру запроса
     */
    public function testGetStructureWithDefaultType(): void
    {
        $query = new Insert();

        $query->name('tableName')
            ->column('column1')
            ->rows([['column1' => 'foo'], ['column1' => 'bar']]);

        $this->assertEquals([
            'type' => 'insert',
            'tableName' => 'tableName',
            'columns' => [
                [
                    'columnName' => 'column1',
                    'type' => 'text',
                    'params' => null,
                ],
            ],
            'rows' => [['column1' => 'foo'], ['column1' => 'bar']],
        ], $query->getStructure());
    }
}
