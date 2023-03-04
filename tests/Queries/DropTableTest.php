<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\DropTable;
use PHPUnit\Framework\TestCase;

/**
 * Удаление таблицы
 */
class DropTableTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new DropTable();

        $query->name('tableName')
            ->ifExists();

        $this->assertEquals([
            'type' => 'dropTable',
            'tableName' => 'tableName',
            'ifExists' => true,
        ], $query->getStructure());
    }
}
