<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Добавление индекса
 */
interface AddBasicIndexInterface extends ActionIndexInterface
{
    /**
     * Название индекса
     *
     * @return $this
     */
    public function name(string $name);
}
