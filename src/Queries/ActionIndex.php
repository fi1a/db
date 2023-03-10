<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\IndexInterface;

/**
 * Абстрактный класс запроса добавления индекса
 *
 * @template T of IndexInterface
 */
abstract class ActionIndex implements ActionIndexInterface
{
    public const TYPE = 'addIndex';

    /**
     * @var T
     */
    protected $index;

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
    public function getStructure(): array
    {
        return [
            'type' => $this->getType(),
            'index' => $this->index->getStructure(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function column(string $column)
    {
        $this->index->column($column);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function columns(array $columns)
    {
        $this->index->columns($columns);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function table(string $tableName)
    {
        $this->index->table($tableName);

        return $this;
    }
}
