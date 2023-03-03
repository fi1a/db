<?php

declare(strict_types=1);

namespace Fi1a\DB;

use Fi1a\DB\Adapters\AdapterInterface;

/**
 * БД
 */
class DB implements DBInterface
{
    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function connection(?string $connectionName = null): AdapterInterface
    {
        // TODO: Implement connection() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function addConnection(AdapterInterface $adapter, ?string $connectionName)
    {
        // TODO: Implement addConnection() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function hasConnection(string $connectionName): bool
    {
        // TODO: Implement hasConnection() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function removeConnection(string $connectionName): bool
    {
        // TODO: Implement removeConnection() method.
    }

    /**
     * @inheritDoc
     */
    public function exec($query): bool
    {
        return $this->connection()->exec($query);
    }

    /**
     * @inheritDoc
     */
    public function query($query): array
    {
        return $this->connection()->query($query);
    }
}
