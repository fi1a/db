<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\Expression;
use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Запрос на выборку
 */
interface SelectInterface extends
    ActionInterface,
    FromActionInterface,
    WhereActionInterface,
    OrderByActionInterface,
    LimitActionInterface,
    SelectableInterface
{
    /**
     * Добавить колонку к выбору
     *
     * @param string|Expression $column
     *
     * @return $this
     */
    public function addColumn($column, ?string $alias = null);

    /**
     * @param array<array-key, string> $columns
     *
     * @return $this
     */
    public function setColumns(array $columns = ['*']);

    /**
     * Добавить HAVING
     *
     * @param string|ExpressionInterface|WhereInterface[] $column
     * @param mixed $value
     *
     * @return $this
     */
    public function having($column, ?string $operation = null, $value = null);

    /**
     * Добавить логику "И" для HAVING
     *
     * @param string|ExpressionInterface|WhereInterface[] $column
     * @param mixed $value
     *
     * @return $this
     */
    public function andHaving($column, ?string $operation = null, $value = null);

    /**
     * Добавить логику "ИЛИ" для HAVING
     *
     * @param string|ExpressionInterface|WhereInterface[] $column
     * @param mixed $value
     *
     * @return $this
     */
    public function orHaving($column, ?string $operation = null, $value = null);

    /**
     * Добавить к запросу DISTINCT
     *
     * @return $this
     */
    public function distinct();

    /**
     * Добавить группировку по полю
     *
     * @return $this
     */
    public function groupBy(string $column);

    /**
     * Установить группировку по полям
     *
     * @param array<array-key, string> $columns
     *
     * @return $this
     */
    public function setGroupBy(array $columns);

    /**
     * Устанавливает с какой строки будет возвращен результат
     *
     * @return $this
     */
    public function offset(int $offset);

    /**
     * Left Join
     *
     * @param ExpressionInterface|WhereInterface $where
     *
     * @return $this
     */
    public function leftJoin(string $tableName, $where);

    /**
     * Right Join
     *
     * @param ExpressionInterface|WhereInterface $where
     *
     * @return $this
     */
    public function rightJoin(string $tableName, $where);

    /**
     * Right Join
     *
     * @param ExpressionInterface|WhereInterface $where
     *
     * @return $this
     */
    public function innerJoin(string $tableName, $where);
}
