<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Условия
 */
trait WhereTrait
{
    /**
     * @var WhereInterface[]
     */
    protected $chain = [];

    /**
     * Добавить логику "И"
     *
     * @param string|ExpressionInterface|WhereInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function where($column, ?string $operation = null, $value = null)
    {
        return $this->andWhere($column, $operation, $value);
    }

    /**
     * Добавить логику "И"
     *
     * @param string|ExpressionInterface|WhereInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function andWhere($column, ?string $operation = null, $value = null)
    {
        $this->chain[] = AndWhere::create($column, $operation, $value);

        return $this;
    }

    /**
     * Добавить логику "ИЛИ"
     *
     * @param string|ExpressionInterface|WhereInterface $column
     * @param mixed $value
     *
     * @return $this
     */
    public function orWhere($column, ?string $operation = null, $value = null)
    {
        $this->chain[] = OrWhere::create($column, $operation, $value);

        return $this;
    }
}
