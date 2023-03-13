<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос
 */
class Query implements QueryInterface
{
    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function select(): SelectInterface
    {
        // TODO: Implement select() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function delete(): DeleteInterface
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function update(): UpdateInterface
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function insert(): InsertInterface
    {
        return new Insert();
    }
}
