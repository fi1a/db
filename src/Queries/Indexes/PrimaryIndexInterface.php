<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Первичный ключ
 */
interface PrimaryIndexInterface extends IndexInterface
{
    /**
     * Увеличение идентификатора в таблице
     *
     * @return $this
     */
    public function increments();
}
