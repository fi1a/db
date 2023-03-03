<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Создание таблицы
 */
class CreateTable implements CreateTableInterface
{
    use TableNameActionTrait;

    public const TYPE = 'crateTable';

    /**
     * @var ColumnCollectionInterface
     */
    protected $columns;

    public function __construct()
    {
        $this->columns = new ColumnCollection();
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
    public function column(ColumnInterface $column)
    {
        $this->columns[] = $column;

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
        ];
    }
}
