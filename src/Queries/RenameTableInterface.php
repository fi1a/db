<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Переименование таблицы
 */
interface RenameTableInterface extends ActionInterface, TableNameActionInterface
{
    /**
     * Новое название таблицы
     *
     * @return $this
     */
    public function newName(string $newTableName);
}
