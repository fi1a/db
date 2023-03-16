<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\AndWhere;
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
}
