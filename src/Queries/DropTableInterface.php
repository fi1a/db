<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Удаление таблицы
 */
interface DropTableInterface extends ActionInterface, NameActionInterface
{
    /**
     * Удалить если существует
     *
     * @return $this
     */
    public function ifExists();
}
