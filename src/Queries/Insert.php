<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос на вставку
 */
class Insert implements InsertInterface
{
    use TableNameActionTrait;
    use ColumnActionTrait;
    use ExecutableTrait;

    public const TYPE = 'insert';

    /**
     * @var ColumnTypeCollectionInterface
     */
    protected $columns;

    /**
     * @var mixed[][]
     */
    protected $rows = [];

    public function __construct()
    {
        $this->columns = new ColumnTypeCollection();
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
    public function row(array $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function rows(array $rows)
    {
        $this->rows = [];
        foreach ($rows as $row) {
            $this->row($row);
        }

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
            'columns' => $this->columns->getStructure(),
            'rows' => $this->rows,
        ];
    }
}
