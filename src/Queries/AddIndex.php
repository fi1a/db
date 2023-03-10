<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Добавление индекса
 */
class AddIndex implements AddIndexInterface
{
    /**
     * @inheritDoc
     */
    public function unique(): AddUniqueIndexInterface
    {
        return new AddUniqueIndex();
    }

    /**
     * @inheritDoc
     */
    public function primary(): AddPrimaryIndexInterface
    {
        return new AddPrimaryIndex();
    }

    /**
     * @inheritDoc
     */
    public function index(): AddBasicIndexInterface
    {
        return new AddBasicIndex();
    }

    /**
     * @inheritDoc
     */
    public function foreign(): AddForeignIndexInterface
    {
        return new AddForeignIndex();
    }
}
