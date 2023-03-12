<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Переименование таблицы
 */
class RenameTable implements RenameTableInterface, ExecutableInterface
{
    use TableNameActionTrait;
    use ExecutableTrait;

    public const TYPE = 'renameTable';

    /**
     * @var string|null
     */
    protected $newTableName;

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
    public function newName(string $newTableName)
    {
        $this->newTableName = $newTableName;

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
            'newTableName' => $this->newTableName,
        ];
    }
}
