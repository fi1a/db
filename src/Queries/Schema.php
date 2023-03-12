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
     */
    public function alter(): AlterTableInterface
    {
        return new AlterTable();
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
     */
    public function addIndex(): AddIndexInterface
    {
        return new AddIndex();
    }

    /**
     * @inheritDoc
     */
    public function dropIndex(): DropIndexInterface
    {
        return new DropIndex();
    }
}
