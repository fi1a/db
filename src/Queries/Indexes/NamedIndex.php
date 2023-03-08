<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Именованный индекс
 */
abstract class NamedIndex extends Index implements NamedIndexInterface
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @inheritDoc
     */
    public function name(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Возвращает структуру
     *
     * @return array{tableName: string|null, columns: array<array-key, string>, name: string|null}
     */
    public function getStructure(): array
    {
        $structure = parent::getStructure();

        $name = $this->name;
        if ($name === null) {
            $name = 'ix';
            foreach ($this->columns as $column) {
                $name .= ucfirst($column);
            }
        }
        $structure['name'] = $name;

        return $structure;
    }
}
