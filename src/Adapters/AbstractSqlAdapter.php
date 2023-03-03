<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

use PDO;

/**
 * Абстрактный SQL адаптер
 */
abstract class AbstractSqlAdapter extends AbstractAdapter implements SqlAdapterInterface
{
    /**
     * Возвращает обработчик по типу запроса
     */
    abstract protected function getHandler(string $type): SqlHandlerInterface;

    /**
     * @var PDO
     */
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function execSql(string $sql): int
    {
        return $this->connection->exec($sql);
    }

    /**
     * @inheritDoc
     */
    public function querySql(string $sql): array
    {
        /** @var array<array-key, array<string, string>>|false $items */
        $items = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $items === false ? [] : $items;
    }

    /**
     * @inheritDoc
     */
    public function getSql($query): string
    {
        $query = $this->getQuery($query);
        $handler = $this->getHandler((string) $query['type']);

        return $handler->getSql($query);
    }

    /**
     * @inheritDoc
     */
    public function exec($query): bool
    {
        $query = $this->getQuery($query);
        $handler = $this->getHandler((string) $query['type']);
        $handler->validate($query);

        return $this->execSql($handler->getSql($query)) > 0;
    }

    /**
     * @inheritDoc
     */
    public function query($query): array
    {
        $query = $this->getQuery($query);
        $handler = $this->getHandler((string) $query['type']);
        $handler->validate($query);

        return $this->querySql($handler->getSql($query));
    }
}
