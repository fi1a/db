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
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * integer
     */
    public function testInteger(): void
    {
        $column = Column::create()->name('column1')->integer();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * bigInteger
     */
    public function testBigInteger(): void
    {
        $column = Column::create()->name('column1')->bigInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'bigInteger',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * binary
     */
    public function testBinary(): void
    {
        $column = Column::create()->name('column1')->binary();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'binary',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * boolean
     */
    public function testBoolean(): void
    {
        $column = Column::create()->name('column1')->boolean();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'boolean',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * char
     */
    public function testChar(): void
    {
        $column = Column::create()->name('column1')->char();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'char',
            'params' => ['length' => 255],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * date
     */
    public function testDate(): void
    {
        $column = Column::create()->name('column1')->date();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'date',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * dateTime
     */
    public function testDateTime(): void
    {
        $column = Column::create()->name('column1')->dateTime();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'dateTime',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * decimal
     */
    public function testDecimal(): void
    {
        $column = Column::create()->name('column1')->decimal();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'decimal',
            'params' => [
                'unsigned' => false,
                'total' => 8,
                'places' => 2,
            ],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * double
     */
    public function testDouble(): void
    {
        $column = Column::create()->name('column1')->double();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'double',
            'params' => [
                'unsigned' => false,
                'total' => null,
                'places' => null,
            ],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * enum
     */
    public function testEnum(): void
    {
        $column = Column::create()->name('column1')->enum(['enum1', 'enum2']);
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'enum',
            'params' => ['enums' => ['enum1', 'enum2'],],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * float
     */
    public function testFloat(): void
    {
        $column = Column::create()->name('column1')->float();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'float',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * json
     */
    public function testJson(): void
    {
        $column = Column::create()->name('column1')->json();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'json',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * longText
     */
    public function testLongText(): void
    {
        $column = Column::create()->name('column1')->longText();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'longText',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * mediumInteger
     */
    public function testMediumInteger(): void
    {
        $column = Column::create()->name('column1')->mediumInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'mediumInteger',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * mediumText
     */
    public function testMediumText(): void
    {
        $column = Column::create()->name('column1')->mediumText();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'mediumText',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * smallInteger
     */
    public function testSmallInteger(): void
    {
        $column = Column::create()->name('column1')->smallInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'smallInteger',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * tinyInteger
     */
    public function testTinyInteger(): void
    {
        $column = Column::create()->name('column1')->tinyInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'tinyInteger',
            'params' => ['unsigned' => false],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * string
     */
    public function testString(): void
    {
        $column = Column::create()->name('column1')->string();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'string',
            'params' => ['length' => 255],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * text
     */
    public function testText(): void
    {
        $column = Column::create()->name('column1')->text();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'text',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * time
     */
    public function testTime(): void
    {
        $column = Column::create()->name('column1')->time();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'time',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * timestamp
     */
    public function testTimestamp(): void
    {
        $column = Column::create()->name('column1')->timestamp();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'timestamp',
            'params' => null,
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
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
            'increments' => false,
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
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * unsigned
     */
    public function testUnsigned(): void
    {
        $column = Column::create()->name('column1')->integer(true);
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => ['unsigned' => true],
            'nullable' => false,
            'default' => null,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
        ], $column->getStructure());
    }

    /**
     * Increments
     */
    public function testIncrements(): void
    {
        $column = Column::create()->name('column1')->increments();
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
            'increments' => true,
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
            ],
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
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
            ],
            'index' => null,
            'foreign' => null,
            'increments' => false,
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
            ],
            'foreign' => null,
            'increments' => false,
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
                'references' => 'column2',
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE',
            ],
            'increments' => false,
        ], $column->getStructure());
    }
}
