<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Удаление индекса
 */
interface DropIndexInterface extends ActionInterface
{
    /**
     * Название таблицы
     *
     * @return $this
     */
    public function table(string $tableName);

    /**
     * Удалить уникальный ключ
     *
     * @return $this
     */
    public function unique(string $indexName);

    /**
     * Удалить первичный ключ
     *
     * @return $this
     */
    public function primary();

    /**
     * Удалить индекс
     *
     * @return $this
     */
    public function index(string $indexName);

    /**
     * Удалить внешний ключ
     *
     * @return $this
     */
    public function foreign(string $indexName);
}
