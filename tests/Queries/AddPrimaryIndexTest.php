<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AddPrimaryIndex;
use PHPUnit\Framework\TestCase;

/**
 * Запрос добавления первичного ключа
 */
class AddPrimaryIndexTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new AddPrimaryIndex();

        $query->table('tableName')
            ->columns(['column1'])
            ->increments();

        $this->assertEquals(
            [
                'type' => 'addIndex',
                'index' => [
                    'type' => 'primary',
                    'tableName' => 'tableName',
                    'columns' => ['column1'],
                    'increments' => true,
                ],
            ],
            $query->getStructure()
        );
    }
}
