<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Уникальный индекс
 */
class UniqueIndex extends NamedIndex implements UniqueIndexInterface
{
    public const TYPE = 'unique';

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
