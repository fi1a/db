<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries\Indexes;

use Fi1a\DB\Queries\Indexes\BasicIndex;
use PHPUnit\Framework\TestCase;

/**
 * Индекс
 */
class BasicIndexTest extends TestCase
{
    /**
     * Индекс
     */
    public function testStructure(): void
    {
        $index = new BasicIndex();

        $index->column('column1')
            ->table('tableName');

        $this->assertEquals([
            'tableName' => 'tableName',
            'columns' => [
                'column1',
            ],
            'name' => 'ixColumn1',
            'type' => 'index',
        ], $index->getStructure());
    }

    /**
     * Индекс
     */
    public function testStructureIndexName(): void
    {
        $index = new BasicIndex();

        $index->column('column1')
            ->table('tableName')
            ->name('ixColumnIndex');

        $this->assertEquals([
            'tableName' => 'tableName',
            'columns' => [
                'column1',
            ],
            'name' => 'ixColumnIndex',
            'type' => 'index',
        ], $index->getStructure());
    }

    /**
     * Индекс
     */
    public function testStructureColumns(): void
    {
        $index = new BasicIndex();

        $index->columns(['column1', 'column2'])
            ->table('tableName');

        $this->assertEquals([
            'tableName' => 'tableName',
            'columns' => [
                'column1', 'column2',
            ],
            'name' => 'ixColumn1Column2',
            'type' => 'index',
        ], $index->getStructure());
    }
}
