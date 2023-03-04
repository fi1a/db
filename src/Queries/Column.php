<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\BasicIndexInterface;
use Fi1a\DB\Queries\Indexes\ForeignIndexInterface;
use Fi1a\DB\Queries\Indexes\PrimaryIndexInterface;
use Fi1a\DB\Queries\Indexes\UniqueIndexInterface;

/**
 * Колонка
 */
class Column implements ColumnInterface
{
    /**
     * @var string|null
     */
    protected $columnName;

    /**
     * @var string
     */
    protected $type = 'integer';

    /**
     * @var array<string, mixed>|null
     */
    protected $typeParams;

    /**
     * @inheritDoc
     */
    protected function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public function name(string $columnName)
    {
        $this->columnName = $columnName;

        return $this;
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function increments()
    {
        // TODO: Implement increments() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function bigInteger()
    {
        // TODO: Implement bigInteger() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function binary()
    {
        // TODO: Implement binary() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function boolean()
    {
        // TODO: Implement boolean() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function char(int $length = 255)
    {
        // TODO: Implement char() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function date()
    {
        // TODO: Implement date() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function dateTime()
    {
        // TODO: Implement dateTime() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function decimal(int $total = 8, int $places = 2)
    {
        // TODO: Implement decimal() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function double(?int $total = null, ?int $places = null)
    {
        // TODO: Implement double() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function enum(array $enums)
    {
        // TODO: Implement enum() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function float()
    {
        // TODO: Implement float() method.
    }

    /**
     * @inheritDoc
     */
    public function integer()
    {
        $this->setType('integer');

        return $this;
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function json()
    {
        // TODO: Implement json() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function longText()
    {
        // TODO: Implement longText() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function mediumInteger()
    {
        // TODO: Implement mediumInteger() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function mediumText()
    {
        // TODO: Implement mediumText() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function smallInteger()
    {
        // TODO: Implement smallInteger() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function tinyInteger()
    {
        // TODO: Implement tinyInteger() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function string(int $length = 255)
    {
        // TODO: Implement string() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function text()
    {
        // TODO: Implement text() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function time()
    {
        // TODO: Implement time() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function timestamp()
    {
        // TODO: Implement timestamp() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function nullable()
    {
        // TODO: Implement nullable() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function default($value)
    {
        // TODO: Implement default() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function unsigned()
    {
        // TODO: Implement unsigned() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function unique(): UniqueIndexInterface
    {
        // TODO: Implement unique() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function primary(): PrimaryIndexInterface
    {
        // TODO: Implement primary() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function index(): BasicIndexInterface
    {
        // TODO: Implement index() method.
    }

    /**
     * @inheritDoc
     * @psalm-suppress InvalidReturnType
     */
    public function foreign(): ForeignIndexInterface
    {
        // TODO: Implement foreign() method.
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): array
    {
        return [
            'columnName' => $this->columnName,
            'type' => $this->type,
            'params' => $this->typeParams,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function create(): ColumnInterface
    {
        return new Column();
    }

    /**
     * Установить тип колонки
     *
     * @param array<string, mixed>|null $params
     */
    protected function setType(string $type, ?array $params = null): void
    {
        $this->type = $type;
        $this->typeParams = $params;
    }
}
