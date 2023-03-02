<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Сортировать по полю
 */
interface OrderByActionInterface
{
    /**
     * Сортировать по полю
     *
     * @return $this
     */
    public function orderBy(string $column, string $direction = 'ASC');
}
