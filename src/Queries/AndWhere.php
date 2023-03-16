<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Условие And
 */
class AndWhere extends AbstractWhere
{
    use WhereTrait;

    public const TYPE = 'and';

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
