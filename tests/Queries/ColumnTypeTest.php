<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\ColumnType;
use PHPUnit\Framework\TestCase;

class ColumnTypeTest extends TestCase
{
    /**
     * Название колонки
     */
    public function testName(): void
    {
        $column = ColumnType::create()->name('column1');
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * integer
     */
    public function testInteger(): void
    {
        $column = ColumnType::create()->name('column1')->integer();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * bigInteger
     */
    public function testBigInteger(): void
    {
        $column = ColumnType::create()->name('column1')->bigInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'bigInteger',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * binary
     */
    public function testBinary(): void
    {
        $column = ColumnType::create()->name('column1')->binary();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'binary',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * boolean
     */
    public function testBoolean(): void
    {
        $column = ColumnType::create()->name('column1')->boolean();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'boolean',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * char
     */
    public function testChar(): void
    {
        $column = ColumnType::create()->name('column1')->char();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'char',
            'params' => ['length' => 255],
        ], $column->getStructure());
    }

    /**
     * date
     */
    public function testDate(): void
    {
        $column = ColumnType::create()->name('column1')->date();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'date',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * dateTime
     */
    public function testDateTime(): void
    {
        $column = ColumnType::create()->name('column1')->dateTime();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'dateTime',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * decimal
     */
    public function testDecimal(): void
    {
        $column = ColumnType::create()->name('column1')->decimal();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'decimal',
            'params' => [
                'unsigned' => false,
                'total' => 8,
                'places' => 2,
            ],
        ], $column->getStructure());
    }

    /**
     * double
     */
    public function testDouble(): void
    {
        $column = ColumnType::create()->name('column1')->double();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'double',
            'params' => [
                'unsigned' => false,
                'total' => null,
                'places' => null,
            ],
        ], $column->getStructure());
    }

    /**
     * enum
     */
    public function testEnum(): void
    {
        $column = ColumnType::create()->name('column1')->enum(['enum1', 'enum2']);
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'enum',
            'params' => ['enums' => ['enum1', 'enum2'],],
        ], $column->getStructure());
    }

    /**
     * float
     */
    public function testFloat(): void
    {
        $column = ColumnType::create()->name('column1')->float();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'float',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * json
     */
    public function testJson(): void
    {
        $column = ColumnType::create()->name('column1')->json();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'json',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * longText
     */
    public function testLongText(): void
    {
        $column = ColumnType::create()->name('column1')->longText();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'longText',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * mediumInteger
     */
    public function testMediumInteger(): void
    {
        $column = ColumnType::create()->name('column1')->mediumInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'mediumInteger',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * mediumText
     */
    public function testMediumText(): void
    {
        $column = ColumnType::create()->name('column1')->mediumText();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'mediumText',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * smallInteger
     */
    public function testSmallInteger(): void
    {
        $column = ColumnType::create()->name('column1')->smallInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'smallInteger',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * tinyInteger
     */
    public function testTinyInteger(): void
    {
        $column = ColumnType::create()->name('column1')->tinyInteger();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'tinyInteger',
            'params' => ['unsigned' => false],
        ], $column->getStructure());
    }

    /**
     * string
     */
    public function testString(): void
    {
        $column = ColumnType::create()->name('column1')->string();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'string',
            'params' => ['length' => 255],
        ], $column->getStructure());
    }

    /**
     * text
     */
    public function testText(): void
    {
        $column = ColumnType::create()->name('column1')->text();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'text',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * time
     */
    public function testTime(): void
    {
        $column = ColumnType::create()->name('column1')->time();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'time',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * timestamp
     */
    public function testTimestamp(): void
    {
        $column = ColumnType::create()->name('column1')->timestamp();
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'timestamp',
            'params' => null,
        ], $column->getStructure());
    }

    /**
     * unsigned
     */
    public function testUnsigned(): void
    {
        $column = ColumnType::create()->name('column1')->integer(true);
        $this->assertEquals([
            'columnName' => 'column1',
            'type' => 'integer',
            'params' => ['unsigned' => true],
        ], $column->getStructure());
    }
}
