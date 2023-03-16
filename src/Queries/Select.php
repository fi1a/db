<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Expressions\ExpressionInterface;

/**
 * Запрос на выборку
 */
class Select implements SelectInterface
{
    use FromActionTrait;
    use LimitActionTrait;
    use OrderByActionTrait;
    use SelectableTrait;
    use WhereTrait;

    public const TYPE = 'select';

    /**
     * @var array<array-key, array{column: ColumnTypeInterface|ExpressionInterface, alias: string|null}>
     */
    protected $columns = [];

    /**
     * @var bool
     */
    protected $distinct = false;

    /**
     * @var string[]
     */
    protected $groupBy = [];

    /**
     * @var int|null
     */
    protected $offset = null;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->columns = [
            [
                'column' => ColumnType::create()->name('*')->text(),
                'alias' => null,
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function column($column, ?string $alias = null)
    {
        foreach ($this->columns as $index => $item) {
            $columnEntity = $item['column'];
            if ($columnEntity instanceof ColumnTypeInterface) {
                $structure = $columnEntity->getStructure();
                if ($structure['columnName'] === '*') {
                    unset($this->columns[$index]);
                }
            }
        }
        if (is_string($column)) {
            $column = ColumnType::create()->name($column)->text();
        }

        $this->columns[] = [
            'column' => $column,
            'alias' => $alias,
        ];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function columns(array $columns = ['*'])
    {
        foreach ($columns as $alias => $column) {
            if (is_numeric($alias)) {
                $alias = null;
            }
            $this->column($column, $alias);
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function having($column, ?string $operation = null, $value = null)
    {
        // TODO: Implement having() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function andHaving($column, ?string $operation = null, $value = null)
    {
        // TODO: Implement andHaving() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function orHaving($column, ?string $operation = null, $value = null)
    {
        // TODO: Implement orHaving() method.
    }

    /**
     * @inheritDoc
     */
    public function distinct()
    {
        $this->distinct = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function groupBy(string $column)
    {
        if (!in_array($column, $this->groupBy)) {
            $this->groupBy[] = $column;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setGroupBy(array $columns)
    {
        foreach ($columns as $column) {
            $this->groupBy($column);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offset(?int $offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function leftJoin(string $tableName, $where)
    {
        // TODO: Implement leftJoin() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function rightJoin(string $tableName, $where)
    {
        // TODO: Implement rightJoin() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function innerJoin(string $tableName, $where)
    {
        // TODO: Implement innerJoin() method.
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

        $columns = [];
        foreach ($this->columns as $column) {
            $columnEntity = $column['column'];
            $columns[] = [
                'column' => $columnEntity instanceof ColumnTypeInterface
                    ? $columnEntity->getStructure()
                    : $columnEntity,
                'alias' => $column['alias'],
            ];
        }

        return [
            'type' => $this->getType(),
            'from' => $this->from,
            'columns' => $columns,
            'where' => $whereStructure,
        ];
    }
}
