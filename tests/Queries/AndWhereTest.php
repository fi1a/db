<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AndWhere;
use Fi1a\DB\Queries\ColumnType;
use PHPUnit\Framework\TestCase;

/**
 * Условие And
 */
class AndWhereTest extends TestCase
{
    /**
     * Структура
     */
    public function testStructure(): void
    {
        $where = AndWhere::create('column1', '=', 'foo')
            ->andWhere('column2', '=', 'bar')
            ->andWhere('column3', '=', 'baz');

        $this->assertEquals([
            'logic' => 'and',
            'column' => 'column1',
            'operation' => '=',
            'value' => 'foo',
            'where' => [
                [
                    'logic' => 'and',
                    'column' => 'column2',
                    'operation' => '=',
                    'value' => 'bar',
                    'where' => [],
                ],
                [
                    'logic' => 'and',
                    'column' => 'column3',
                    'operation' => '=',
                    'value' => 'baz',
                    'where' => [],
                ],
            ],
        ], $where->getStructure());
    }

    /**
     * Структура
     */
    public function testNestedStructure(): void
    {
        $where = AndWhere::create(
            AndWhere::create('column2', '=', 'bar')
                ->andWhere('column3', '=', 'baz'),
            '=',
            'foo'
        );

        $this->assertEquals([
            'logic' => 'and',
            'column' => [
                [
                    'logic' => 'and',
                    'column' => 'column2',
                    'operation' => '=',
                    'value' => 'bar',
                    'where' => [
                        [
                            'logic' => 'and',
                            'column' => 'column3',
                            'operation' => '=',
                            'value' => 'baz',
                            'where' => [],
                        ],
                    ],
                ],
            ],
            'operation' => null,
            'value' => null,
            'where' => [],
        ], $where->getStructure());
    }

    /**
     * Структура
     */
    public function testStructureWithColumnName(): void
    {
        $where = AndWhere::create(ColumnType::create()->name('column1')->text(), '=', 'foo')
            ->andWhere(ColumnType::create()->name('column2')->text(), '=', 'bar')
            ->andWhere(
                ColumnType::create()->name('column3')->text(),
                '=',
                ColumnType::create()->name('column3')->text()
            );

        $this->assertEquals([
            'logic' => 'and',
            'column' => [
                'columnName' => 'column1',
                'type' => 'text',
                'params' => null,
            ],
            'operation' => '=',
            'value' => 'foo',
            'where' => [
                [
                    'logic' => 'and',
                    'column' => [
                        'columnName' => 'column2',
                        'type' => 'text',
                        'params' => null,
                    ],
                    'operation' => '=',
                    'value' => 'bar',
                    'where' => [],
                ],
                [
                    'logic' => 'and',
                    'column' => [
                        'columnName' => 'column3',
                        'type' => 'text',
                        'params' => null,
                    ],
                    'operation' => '=',
                    'value' => [
                        'columnName' => 'column3',
                        'type' => 'text',
                        'params' => null,
                    ],
                    'where' => [],
                ],
            ],
        ], $where->getStructure());
    }
}
