<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Лимит запроса
 */
interface LimitActionInterface
{
    /**
     * Лимит запроса
     *
     * @return $this
     */
    public function limit(int $limit);
}
