<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Expressions;

/**
 * Sql выражение
 */
class SqlExpression extends Expression
{
    protected $sql;

    public function __construct(string $sql)
    {
        $this->sql = $sql;
    }

    public function getSql(): string
    {
        return $this->sql;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getSql();
    }
}
