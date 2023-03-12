<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Удаление таблицы
 */
class DropTable implements DropTableInterface, ExecutableInterface
{
    use TableNameActionTrait;
    use ExecutableTrait;

    public const TYPE = 'dropTable';

    /**
     * @var bool
     */
    protected $ifExists = false;

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
    public function ifExists()
    {
        $this->ifExists = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        return [
            'type' => $this->getType(),
            'tableName' => $this->tableName,
            'ifExists' => $this->ifExists,
        ];
    }
}
