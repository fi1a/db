<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Условие Or
 */
class OrWhere extends AbstractWhere
{
    use WhereTrait;

    public const TYPE = 'or';

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
