<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries\Indexes;

use Fi1a\DB\Queries\Indexes\ForeignIndex;
use PHPUnit\Framework\TestCase;

/**
 * Внешний ключ
 */
class ForeignIndexTest extends TestCase
{
    /**
     * Внешний ключ
     */
    public function testStructure(): void
    {
        $foreign = new ForeignIndex();

        $foreign->on('tableName2')
            ->references(['refColumn'])
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE')
            ->column('column1')
            ->table('tableName1');

        $this->assertEquals([
            'tableName' => 'tableName1',
            'columns' => [
                'column1',
            ],
            'name' => 'ixColumn1',
            'on' => 'tableName2',
            'references' => [
                'refColumn',
            ],
            'onDelete' => 'CASCADE',
            'onUpdate' => 'CASCADE',
            'type' => 'foreign',
        ], $foreign->getStructure());
    }
}
