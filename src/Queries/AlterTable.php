<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Изменение таблицы
 */
class AlterTable implements AlterTableInterface, ExecutableInterface
{
    use TableNameActionTrait;
    use ExecutableTrait;

    public const TYPE = 'alterTable';

    /**
     * @var string[]
     */
    protected $dropColumns = [];

    /**
     * @var ColumnCollectionInterface
     */
    protected $addColumns;

    /**
     * @var ColumnCollectionInterface
     */
    protected $changeColumns;

    public function __construct()
    {
        $this->addColumns = new ColumnCollection();
        $this->changeColumns = new ColumnCollection();
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
    public function dropColumn(string ...$columnNames)
    {
        $this->dropColumns = array_merge($this->dropColumns, $columnNames);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addColumn(ColumnInterface $column)
    {
        $this->addColumns[] = $column;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function changeColumn(ColumnInterface $column)
    {
        $this->changeColumns[] = $column;

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
            'dropColumns' => $this->dropColumns,
            'addColumns' => $this->addColumns->getStructure(),
            'changeColumns' => $this->changeColumns->getStructure(),
        ];
    }
}
