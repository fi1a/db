<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Индексы с названием
 */
interface NamedIndexInterface
{
    /**
     * Название индекса
     *
     * @return $this
     */
    public function name(string $name);
}
