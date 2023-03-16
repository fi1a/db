<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Сортировать по полю
 */
interface OrderByActionInterface
{
    public const ASC = 'ASC';

    public const DESC = 'DESC';

    /**
     * Сортировать по полю
     *
     * @return $this
     */
    public function orderBy(string $column, string $direction = self::ASC);

    /**
     * Сортировать по полю
     *
     * @param array<string, string> $orderBy
     *
     * @return $this
     */
    public function setOrderBy(array $orderBy);
}
