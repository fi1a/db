<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Условия
 */
interface WhereActionInterface
{
    /**
     * Добавить логику "И"
     *
     * @param string|ExpressionInterface|WhereInterface|ColumnTypeInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function where($column, ?string $operation = null, $value = null);

    /**
     * Добавить логику "И"
     *
     * @param string|ExpressionInterface|WhereInterface|ColumnTypeInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function andWhere($column, ?string $operation = null, $value = null);

    /**
     * Добавить логику "ИЛИ"
     *
     * @param string|ExpressionInterface|WhereInterface|ColumnTypeInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function orWhere($column, ?string $operation = null, $value = null);
}
