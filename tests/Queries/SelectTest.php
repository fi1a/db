<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Queries;

use Fi1a\DB\Queries\ColumnType;
use Fi1a\DB\Queries\OrderByActionInterface;
use Fi1a\DB\Queries\Select;
use PHPUnit\Framework\TestCase;

/**
 * Запрос на выборку
 */
class SelectTest extends TestCase
{
    /**
     * Возвращает структуру запроса
     */
    public function testGetStructure(): void
    {
        $query = new Select();

        $query->from('tableName', 'tableAlias')
            ->column('column1')
            ->column(ColumnType::create()->name('column2')->integer(), 'columnAlias')
            ->where('column2', '=', 2)
             ->limit(1)
            ->setOrderBy([
                'column1' => OrderByActionInterface::ASC,
                'column2' => OrderByActionInterface::DESC,
            ]);

        $this->assertEquals([
            'type' => 'select',
            'from' => [
                'table' => 'tableName',
                'alias' => 'tableAlias',
            ],
            'columns' => [
                [
                    'column' => [
                        'columnName' => 'column1',
                        'type' => 'text',
                        'params' => null,
                    ],
                    'alias' => null,
                ],
                [
                    'column' => [
                        'columnName' => 'column2',
                        'type' => 'integer',
                        'params' => [
                            'unsigned' => false,
                        ],
                    ],
                    'alias' => 'columnAlias',
                ],
            ],
            'where' => [
                [
                    'logic' => 'and',
                    'column' => 'column2',
                    'operation' => '=',
                    'value' => 2,
                    'where' => [],
                ],
            ],
        ], $query->getStructure());
    }

    /**
     * Исключение при пустом имени таблицы
     */
    public function testFromException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $query = new Select();
        $query->from('');
    }

    /**
     * Исключение при неизветсном направленит сортировки
     */
    public function testOrderByDirectionException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $query = new Select();
        $query->orderBy('colum1', 'UNKNOWN');
    }

    /**
     * Исключение при пустом названии колоник
     */
    public function testOrderByException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $query = new Select();
        $query->orderBy('');
    }
}
