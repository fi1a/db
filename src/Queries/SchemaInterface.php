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
     * Переименование таблицы
     */
    public function rename(): RenameTableInterface;

    /**
     * Добавление индекса
     */
    public function addIndex(): AddIndexInterface;

    /**
     * Удаление индекса
     */
    public function dropIndex(): DropIndexInterface;
}
