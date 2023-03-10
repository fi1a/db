<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Индекс
 */
class BasicIndex extends NamedIndex implements BasicIndexInterface
{
    public const TYPE = 'index';

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
