<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AlterTable;
use Fi1a\DB\Queries\Column;
use PHPUnit\Framework\TestCase;

/**
 * Изменение таблицы
 */
class AlterTableTest extends TestCase
{
    /**
     * Изменение таблицы
     */
    public function testGetStructure(): void
    {
        $query = new AlterTable();

        $query->name('tableName')
            ->dropColumn('dropColumn')
            ->addColumn(Column::create()->name('column1'))
            ->changeColumn(Column::create()
                ->name('column2')
                ->rename('newColumnName'));

        $this->assertEquals([
            'type' => 'alterTable',
            'tableName' => 'tableName',
            'dropColumns' => ['dropColumn'],
            'addColumns' => [
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
            ],
            'changeColumns' => [
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
                    'rename' => 'newColumnName',
                ],
            ],
        ], $query->getStructure());
    }
}
