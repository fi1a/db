<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Внешний ключ
 */
interface ForeignIndexInterface extends IndexInterface, NamedIndexInterface
{
    /**
     * Название колонки на которую ссылается внешний ключ
     *
     * @return $this
     */
    public function references(string $column);

    /**
     * Название таблицы на которую ссылается внешний ключ
     *
     * @return $this
     */
    public function on(string $tableName);

    /**
     * Действие при удалении
     *
     * @return $this
     */
    public function onDelete(string $action);
}
