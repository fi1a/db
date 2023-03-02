<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос
 */
interface QueryInterface
{
    /**
     * Запрос на выборку
     */
    public function select(): SelectInterface;

    /**
     * Запрос на удаление
     */
    public function delete(): DeleteInterface;

    /**
     * Запрос на обновление
     */
    public function update(): UpdateInterface;

    /**
     * Запрос на вставку
     */
    public function insert(): InsertInterface;
}
