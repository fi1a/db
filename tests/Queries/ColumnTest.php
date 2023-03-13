<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\Column;
use PHPUnit\Framework\TestCase;

/**
 * Колонка
 */
class ColumnTest extends TestCase
{
    /**
     * Название колонки
     */
    public function testName(): void
    {
        $column = Column::create()->name('column1');
        $this->assertEquals([
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
        ], $column->getStructure());
    }

    /**
     * Название колонки
     */
    public function testRename(): void
    {
        $column = Column::create()->name('column1')->rename('newColumnName');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'rename' => 'newColumnName',
        ], $column->getStructure());
    }

    /**
     * nullable
     */
    public function testNullable(): void
    {
        $column = Column::create()->name('column1')->nullable();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => true,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * default
     */
    public function testDefault(): void
    {
        $column = Column::create()->name('column1')->default(100);
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => 100,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Unique
     */
    public function testUnique(): void
    {
        $column = Column::create()->name('column1')->unique('ixColumn1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => [
                'tableName' => null,
                'columns' => [
                    'column1',
                ],
                'name' => 'ixColumn1',
                'type' => 'unique',
            ],
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Unique
     */
    public function testUniqueSetColumnName(): void
    {
        $column = Column::create()->unique('ixColumn1')->name('column1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => [
                'tableName' => null,
                'columns' => [
                    'column1',
                ],
                'name' => 'ixColumn1',
                'type' => 'unique',
            ],
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Primary
     */
    public function testPrimary(): void
    {
        $column = Column::create()->name('column1')->primary();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => [
                'tableName' => null,
                'columns' => [],
                'type' => 'primary',
                'increments' => true,
            ],
            'index' => null,
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Index
     */
    public function testIndex(): void
    {
        $column = Column::create()->name('column1')->index('ixColumn1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => [
                'tableName' => null,
                'columns' => [
                    'column1',
                ],
                'name' => 'ixColumn1',
                'type' => 'index',
            ],
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Index
     */
    public function testIndexSetColumnName(): void
    {
        $column = Column::create()->index('ixColumn1')->name('column1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => [
                'tableName' => null,
                'columns' => [
                    'column1',
                ],
                'name' => 'ixColumn1',
                'type' => 'index',
            ],
            'foreign' => null,
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Foreign
     */
    public function testForeign(): void
    {
        $column = Column::create()->name('column1')
            ->foreign('tableName2', 'column2', 'CASCADE', 'CASCADE', 'ixColumn1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => [
                'tableName' => null,
                'on' => 'tableName2',
                'name' => 'ixColumn1',
                'columns' => [
                    'column1',
                ],
                'references' => [
                    'column2',
                ],
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE',
                'type' => 'foreign',
            ],
            'rename' => null,
        ], $column->getStructure());
    }

    /**
     * Foreign
     */
    public function testForeignSetColumnName(): void
    {
        $column = Column::create()
            ->foreign('tableName2', 'column2', 'CASCADE', 'CASCADE', 'ixColumn1')
            ->name('column1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => [
                'tableName' => null,
                'on' => 'tableName2',
                'name' => 'ixColumn1',
                'columns' => [
                    'column1',
                ],
                'references' => [
                    'column2',
                ],
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE',
                'type' => 'foreign',
            ],
            'rename' => null,
        ], $column->getStructure());
    }
}
