<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

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
}
