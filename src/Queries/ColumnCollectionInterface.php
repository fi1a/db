<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\Collection\CollectionInterface;

/**
 * Коллекция колонок
 */
interface ColumnCollectionInterface extends CollectionInterface
{
    /**
     * Возвращает структуру
     *
     * @return array<array-key, array<string, mixed>>
     */
    public function getStructure(): array;
}
