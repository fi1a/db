<?php

declare(strict_types=1);

namespace Fi1a\DB;

use Fi1a\DB\Adapters\AdapterInterface;
use Fi1a\DB\Exceptions\ConnectionNotFoundException;

/**
 * БД
 */
class DB implements DBInterface
{
    /**
     * @var AdapterInterface[]
     */
    protected $connections = [];

    /**
     * @inheritDoc
     */
    public function connection(string $connectionName): AdapterInterface
    {
        if (!$this->hasConnection($connectionName)) {
            throw new ConnectionNotFoundException(sprintf('Соединение "%s" не найдено', $connectionName));
        }

        return $this->connections[mb_strtolower($connectionName)];
    }

    /**
     * @inheritDoc
     */
    public function addConnection(AdapterInterface $adapter, string $connectionName)
    {
        $this->connections[mb_strtolower($connectionName)] = $adapter;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function hasConnection(string $connectionName): bool
    {
        return array_key_exists(mb_strtolower($connectionName), $this->connections);
    }

    /**
     * @inheritDoc
     */
    public function removeConnection(string $connectionName): bool
    {
        if (!$this->hasConnection($connectionName)) {
            return false;
        }

        unset($this->connections[mb_strtolower($connectionName)]);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function exec($query): bool
    {
        return $this->connection(self::DEFAULT_CONNECTION)->exec($query);
    }

    /**
     * @inheritDoc
     */
    public function query($query): array
    {
        return $this->connection(self::DEFAULT_CONNECTION)->query($query);
    }
}
