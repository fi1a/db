<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запросы изменяющие структуру таблицы
 */
interface SchemaInterface
{
    /**
     * Изменение таблицы
     */
    public function alter(): AlterTableInterface;

    /**
     * Создание таблицы
     */
    public function create(): CreateTableInterface;

    /**
     * Удаление таблицы
     */
    public function drop(): DropTableInterface;

    /**
     * Добавление индекса
     */
    public function addIndex(): AddIndexInterface;

    /**
     * Удаление индекса
     */
    public function dropIndex(): DropIndexInterface;
}
