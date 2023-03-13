<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Коллекция колонок
 */
class ColumnCollection extends AbstractColumnCollection implements ColumnCollectionInterface
{
    /**
     * @param ColumnInterface[]|null $data
     */
    public function __construct(?array $data = null)
    {
        parent::__construct(ColumnInterface::class, $data);
    }
}
