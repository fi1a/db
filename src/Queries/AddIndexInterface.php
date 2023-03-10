<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Добавление индекса
 */
interface AddIndexInterface
{
    /**
     * Добавить уникальный ключ
     */
    public function unique(): AddUniqueIndexInterface;

    /**
     * Добавить первичный ключ
     */
    public function primary(): AddPrimaryIndexInterface;

    /**
     * Добавить индекс
     */
    public function index(): AddBasicIndexInterface;

    /**
     * Добавить внешний ключ
     */
    public function foreign(): AddForeignIndexInterface;
}
