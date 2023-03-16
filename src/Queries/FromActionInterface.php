<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Логика from
 */
interface FromActionInterface
{
    /**
     * Логика from
     *
     * @return $this
     */
    public function from(string $table, ?string $alias = null);
}
