<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\ColumnType;
use Fi1a\DB\Queries\OrWhere;
use PHPUnit\Framework\TestCase;

/**
 * Условие Or
 */
class OrWhereTest extends TestCase
{
    /**
     * Структура
     */
    public function testStructure(): void
    {
        $where = OrWhere::create('column1', '=', 'foo')
            ->orWhere('column2', '=', 'bar')
            ->orWhere('column3', '=', 'baz');

        $this->assertEquals([
            'logic' => 'or',
            'column' => 'column1',
            'operation' => '=',
            'value' => 'foo',
            'where' => [
                [
                    'logic' => 'or',
                    'column' => 'column2',
                    'operation' => '=',
                    'value' => 'bar',
                    'where' => [],
                ],
                [
                    'logic' => 'or',
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
        $where = OrWhere::create(
            OrWhere::create('column2', '=', 'bar')
                ->orWhere('column3', '=', 'baz'),
            '=',
            'foo'
        );

        $this->assertEquals([
            'logic' => 'or',
            'column' => [
                [
                    'logic' => 'or',
                    'column' => 'column2',
                    'operation' => '=',
                    'value' => 'bar',
                    'where' => [
                        [
                            'logic' => 'or',
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
        $where = OrWhere::create(ColumnType::create()->name('column1')->text(), '=', 'foo')
            ->orWhere(ColumnType::create()->name('column2')->text(), '=', 'bar')
            ->orWhere(
                ColumnType::create()->name('column3')->text(),
                '=',
                ColumnType::create()->name('column3')->text()
            );

        $this->assertEquals([
            'logic' => 'or',
            'column' => [
                'columnName' => 'column1',
                'type' => 'text',
                'params' => null,
            ],
            'operation' => '=',
            'value' => 'foo',
            'where' => [
                [
                    'logic' => 'or',
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
                    'logic' => 'or',
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
