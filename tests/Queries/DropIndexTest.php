<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\DropIndex;
use PHPUnit\Framework\TestCase;

/**
 * Удаление индекса
 */
class DropIndexTest extends TestCase
{
    /**
     * Возвращает структуру запроса для удаления первичного ключа
     */
    public function testDropPrimaryIndex(): void
    {
        $query = new DropIndex();

        $query->table('tableName')->primary();

        $this->assertEquals([
            'type' => 'dropIndex',
            'indexType' => 'primary',
            'indexName' => null,
            'tableName' => 'tableName',
        ], $query->getStructure());
    }

    /**
     * Возвращает структуру запроса для удаления первичного ключа
     */
    public function testDropUniqueIndex(): void
    {
        $query = new DropIndex();

        $query->table('tableName')->unique('ixUnique');

        $this->assertEquals([
            'type' => 'dropIndex',
            'indexType' => 'unique',
            'indexName' => 'ixUnique',
            'tableName' => 'tableName',
        ], $query->getStructure());
    }

    /**
     * Возвращает структуру запроса для удаления первичного ключа
     */
    public function testDropIndex(): void
    {
        $query = new DropIndex();

        $query->table('tableName')->index('ixIndex');

        $this->assertEquals([
            'type' => 'dropIndex',
            'indexType' => 'index',
            'indexName' => 'ixIndex',
            'tableName' => 'tableName',
        ], $query->getStructure());
    }

    /**
     * Возвращает структуру запроса для удаления первичного ключа
     */
    public function testDropForeignIndex(): void
    {
        $query = new DropIndex();

        $query->table('tableName')->foreign('ixForeign');

        $this->assertEquals([
            'type' => 'dropIndex',
            'indexType' => 'foreign',
            'indexName' => 'ixForeign',
            'tableName' => 'tableName',
        ], $query->getStructure());
    }
}
