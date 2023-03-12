<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\RenameTable;
use PHPUnit\Framework\TestCase;

/**
 * Переименование таблицы
 */
class RenameTableTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new RenameTable();

        $query->name('tableName')
            ->newName('newTableName');

        $this->assertEquals([
            'type' => 'renameTable',
            'tableName' => 'tableName',
            'newTableName' => 'newTableName',
        ], $query->getStructure());
    }
}
