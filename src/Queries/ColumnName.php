<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонка
 */
class ColumnName implements ColumnNameInterface
{
    /**
     * @var string|null
     */
    protected $columnName;

    /**
     * @inheritDoc
     */
    public function name(string $columnName)
    {
        $this->columnName = $columnName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        return [
            'columnName' => $this->columnName,
        ];
    }

    /**
     * @inheritDoc
     * @psalm-suppress UnsafeInstantiation
     */
    public static function create()
    {
        return new static();
    }
}
