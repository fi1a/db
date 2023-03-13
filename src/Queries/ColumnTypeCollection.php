<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Коллекция колонок
 */
class ColumnTypeCollection extends AbstractColumnCollection
{
    /**
     * @param ColumnTypeInterface[]|null $data
     */
    public function __construct(?array $data = null)
    {
        parent::__construct(ColumnTypeInterface::class, $data);
    }
}
