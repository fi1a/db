<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Внешний ключ
 */
class ForeignIndex extends NamedIndex implements ForeignIndexInterface
{
    /**
     * @var string|null
     */
    protected $references;

    /**
     * @var string|null
     */
    protected $on;

    /**
     * @var string|null
     */
    protected $action;

    /**
     * @inheritDoc
     */
    public function references(string $column)
    {
        $this->references = $column;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function on(string $tableName)
    {
        $this->on = $tableName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function onDelete(string $action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function column(string $column)
    {
        $this->columns = [];

        return parent::column($column);
    }

    /**
     * Возвращает структуру
     *
     * @return array{
     *     tableName: string|null,
     *     columns: array<array-key, string>,
     *     name: string|null,
     *     on: string|null,
     *     references: string|null,
     *     action: string|null
     * }
     */
    public function getStructure(): array
    {
        $structure = parent::getStructure();

        $structure['on'] = $this->on;
        $structure['references'] = $this->references;
        $structure['action'] = $this->action;

        return $structure;
    }
}
