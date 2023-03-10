<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries\Indexes;

/**
 * Первичный ключ
 */
class PrimaryIndex extends Index implements PrimaryIndexInterface
{
    public const TYPE = 'primary';

    /**
     * @var bool
     */
    protected $increments = false;

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function increments()
    {
        $this->increments = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        $structure = parent::getStructure();

        $structure['increments'] = $this->increments;

        return $structure;
    }
}
