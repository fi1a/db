<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Удаление индекса
 */
interface DropIndexInterface extends ActionInterface
{
    /**
     * Название индекса
     *
     * @return $this
     */
    public function name(string $indexName);

    /**
     * Добавить уникальный ключ
     *
     * @return $this
     */
    public function unique();

    /**
     * Добавить первичный ключ
     *
     * @return $this
     */
    public function primary();

    /**
     * Добавить индекс
     *
     * @return $this
     */
    public function index();

    /**
     * Добавить внешний ключ
     *
     * @return $this
     */
    public function foreign();
}
