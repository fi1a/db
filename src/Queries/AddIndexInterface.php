<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\BasicIndexInterface;
use Fi1a\DB\Queries\Indexes\ForeignIndexInterface;
use Fi1a\DB\Queries\Indexes\PrimaryIndexInterface;
use Fi1a\DB\Queries\Indexes\UniqueIndexInterface;

/**
 * Добавление индекса
 */
interface AddIndexInterface extends ActionInterface
{
    /**
     * Добавить уникальный ключ
     */
    public function unique(): UniqueIndexInterface;

    /**
     * Добавить первичный ключ
     */
    public function primary(): PrimaryIndexInterface;

    /**
     * Добавить индекс
     */
    public function index(): BasicIndexInterface;

    /**
     * Добавить внешний ключ
     */
    public function foreign(): ForeignIndexInterface;
}
