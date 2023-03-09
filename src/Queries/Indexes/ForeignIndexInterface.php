<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Внешний ключ
 */
interface ForeignIndexInterface extends IndexInterface, NamedIndexInterface
{
    public const CASCADE = 'CASCADE';

    public const SET_NULL = 'SET NULL';

    public const RESTRICT = 'RESTRICT';

    public const SET_DEFAULT = 'SET DEFAULT';

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

    /**
     * Действие при обновлении
     *
     * @return $this
     */
    public function onUpdate(string $action);
}
