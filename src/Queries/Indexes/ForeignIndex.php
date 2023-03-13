<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Внешний ключ
 */
class ForeignIndex extends NamedIndex implements ForeignIndexInterface
{
    public const TYPE = 'foreign';

    /**
     * @var string[]
     */
    protected $references = [];

    /**
     * @var string|null
     */
    protected $on;

    /**
     * @var string|null
     */
    protected $onDelete;

    /**
     * @var string|null
     */
    protected $onUpdate;

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
    public function references(array $columns)
    {
        $this->references = [];
        foreach ($columns as $column) {
            $this->reference($column);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function reference(string $column)
    {
        if (!in_array($column, $this->references)) {
            $this->references[] = $column;
        }

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
        $this->onDelete = $action;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function onUpdate(string $action)
    {
        $this->onUpdate = $action;

        return $this;
    }

    /**
     * Возвращает структуру
     *
     * @return array{
     *     tableName: string|null,
     *     columns: array<array-key, string>,
     *     name: string|null,
     *     on: string|null,
     *     references: string[],
     *     onDelete: string|null,
     *     onUpdate: string|null
     * }
     */
    public function getStructure(): array
    {
        $structure = parent::getStructure();

        $structure['on'] = $this->on;
        $structure['references'] = $this->references;
        $structure['onDelete'] = $this->onDelete;
        $structure['onUpdate'] = $this->onUpdate;

        return $structure;
    }
}
