<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\Collection\Collection;

/**
 * Коллекция колонок
 */
class ColumnCollection extends Collection implements ColumnCollectionInterface
{
    /**
     * @param ColumnInterface[]|null $data
     */
    public function __construct(?array $data = null)
    {
        parent::__construct(ColumnInterface::class, $data);
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        $structure = [];
        /** @var ColumnInterface $column */
        foreach ($this->storage as $column) {
            $structure[] = $column->getStructure();
        }

        return $structure;
    }
}
