<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Удаление индекса
 */
class DropIndex implements DropIndexInterface, ExecutableInterface
{
    use ExecutableTrait;

    public const TYPE = 'dropIndex';

    /**
     * @var string|null
     */
    protected $indexType;

    /**
     * @var string|null
     */
    protected $indexName;

    /**
     * @var string|null
     */
    protected $tableName;

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
    public function table(string $tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function unique(string $indexName)
    {
        $this->indexName = $indexName;
        $this->indexType = 'unique';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function primary()
    {
        $this->indexName = null;
        $this->indexType = 'primary';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function index(string $indexName)
    {
        $this->indexName = $indexName;
        $this->indexType = 'index';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function foreign(string $indexName)
    {
        $this->indexName = $indexName;
        $this->indexType = 'foreign';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        return [
            'type' => $this->getType(),
            'indexType' => $this->indexType,
            'indexName' => $this->indexName,
            'tableName' => $this->tableName,
        ];
    }
}
