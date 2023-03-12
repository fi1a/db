<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Создание таблицы
 */
class CreateTable implements CreateTableInterface, ExecutableInterface
{
    use TableNameActionTrait;
    use ExecutableTrait;

    public const TYPE = 'createTable';

    /**
     * @var ColumnCollectionInterface
     */
    protected $columns;

    /**
     * @var bool
     */
    protected $ifNotExists = false;

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
        $column->rename(null);
        $this->columns[] = $column;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function ifNotExists()
    {
        $this->ifNotExists = true;

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
            'ifNotExists' => $this->ifNotExists,
            'columns' => $this->columns->getStructure(),
        ];
    }
}
