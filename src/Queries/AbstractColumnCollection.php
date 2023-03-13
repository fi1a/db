<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\Collection\Collection;

/**
 * Абстрактный класс коллекции колонок
 */
abstract class AbstractColumnCollection extends Collection implements ColumnTypeCollectionInterface
{
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
