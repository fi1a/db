<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запросы изменяющие структуру таблицы
 */
class Schema implements SchemaInterface
{
    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function alter(): AlterTableInterface
    {
        // TODO: Implement alter() method.
    }

    /**
     * @inheritDoc
     */
    public function create(): CreateTableInterface
    {
        return new CreateTable();
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function drop(): DropTableInterface
    {
        return new DropTable();
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function addIndex(): AddIndexInterface
    {
        // TODO: Implement addIndex() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function dropIndex(): DropIndexInterface
    {
        // TODO: Implement dropIndex() method.
    }
}
