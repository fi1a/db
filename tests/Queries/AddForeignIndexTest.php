<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AddForeignIndex;
use Fi1a\DB\Queries\Indexes\ForeignIndexInterface;
use PHPUnit\Framework\TestCase;

class AddForeignIndexTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new AddForeignIndex();

        $query->table('tableName')
            ->columns(['column1'])
            ->on('foreignTableName')
            ->references(['column1'])
            ->name('ixColumn1')
            ->onDelete(ForeignIndexInterface::CASCADE)
            ->onUpdate(ForeignIndexInterface::CASCADE);

        $this->assertEquals(
            [
                'type' => 'addIndex',
                'index' => [
                    'type' => 'foreign',
                    'tableName' => 'tableName',
                    'columns' => ['column1'],
                    'name' => 'ixColumn1',
                    'on' => 'foreignTableName',
                    'references' => ['column1'],
                    'onDelete' => ForeignIndexInterface::CASCADE,
                    'onUpdate' => ForeignIndexInterface::CASCADE,
                ],
            ],
            $query->getStructure()
        );
    }

    /**
     * Возвращает структуру запроса
     */
    public function testGetStructureReference(): void
    {
        $query = new AddForeignIndex();

        $query->table('tableName')
            ->column('column1')
            ->on('foreignTableName')
            ->reference('column1')
            ->name('ixColumn1')
            ->onDelete(ForeignIndexInterface::CASCADE)
            ->onUpdate(ForeignIndexInterface::CASCADE);

        $this->assertEquals(
            [
                'type' => 'addIndex',
                'index' => [
                    'type' => 'foreign',
                    'tableName' => 'tableName',
                    'columns' => ['column1'],
                    'name' => 'ixColumn1',
                    'on' => 'foreignTableName',
                    'references' => ['column1'],
                    'onDelete' => ForeignIndexInterface::CASCADE,
                    'onUpdate' => ForeignIndexInterface::CASCADE,
                ],
            ],
            $query->getStructure()
        );
    }
}
