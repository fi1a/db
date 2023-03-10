<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Добавление первичного индекса
 */
interface AddPrimaryIndexInterface extends ActionIndexInterface
{
    /**
     * Увеличение идентификатора в таблице
     *
     * @return $this
     */
    public function increments();
}
