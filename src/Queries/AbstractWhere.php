<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Условие
 */
abstract class AbstractWhere implements WhereInterface
{
    use WhereTrait;

    /**
     * @var string|ExpressionInterface|WhereInterface|ColumnTypeInterface
     */
    protected $column;

    /**
     * @var string|null
     */
    protected $operation;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param string|ExpressionInterface|WhereInterface|ColumnTypeInterface $column
     * @param mixed $value
     */
    protected function __construct($column, ?string $operation = null, $value = null)
    {
        $this->column = $column;
        if (!($column instanceof WhereInterface) && !($column instanceof ExpressionInterface)) {
            $this->operation = $operation;
            $this->value = $value;
        }
    }

    /**
     * @inheritDoc
     * @psalm-suppress UnsafeInstantiation
     */
    public static function create($column, ?string $operation = null, $value = null)
    {
        return new static($column, $operation, $value);
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        $whereStructure = [];

        foreach ($this->chain as $where) {
            $whereStructure[] = $where->getStructure();
        }

        $column = $this->column;
        if ($this->column instanceof WhereInterface) {
            $column = [$this->column->getStructure()];
        } elseif ($this->column instanceof ColumnNameInterface) {
            $column = $this->column->getStructure();
        }

        /** @var mixed $value */
        $value = $this->value;
        if ($this->value instanceof ColumnNameInterface) {
            $value = $this->value->getStructure();
        }

        return [
            'logic' => $this->getType(),
            'column' => $column,
            'operation' => $this->operation,
            'value' => $value,
            'where' => $whereStructure,
        ];
    }
}
