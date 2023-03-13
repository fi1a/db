<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Индекс
 */
abstract class Index implements IndexInterface
{
    /**
     * @var string|null
     */
    protected $tableName;

    /**
     * @var array<array-key, string>
     */
    protected $columns = [];

    /**
     * @inheritDoc
     */
    public function column(string $column)
    {
        if (!in_array($column, $this->columns)) {
            $this->columns[] = $column;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function columns(array $columns)
    {
        $this->columns = [];
        foreach ($columns as $column) {
            $this->column($column);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function table(string $tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        return [
            'type' => $this->getType(),
            'tableName' => $this->tableName,
            'columns' => $this->columns,
        ];
    }
}
