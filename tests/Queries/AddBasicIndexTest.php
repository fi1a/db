<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AddBasicIndex;
use PHPUnit\Framework\TestCase;

/**
 * Добавление индекса
 */
class AddBasicIndexTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new AddBasicIndex();

        $query->table('tableName')
            ->columns(['column1'])
            ->column('column1')
            ->name('ixColumn1');

        $this->assertEquals(
            [
                'type' => 'addIndex',
                'index' => [
                    'type' => 'index',
                    'tableName' => 'tableName',
                    'columns' => ['column1'],
                    'name' => 'ixColumn1',
                ],
            ],
            $query->getStructure()
        );
    }
}
