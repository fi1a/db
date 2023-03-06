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
     * @var bool
     */
    protected $nullable = false;

    /**
     * @var mixed|null
     */
    protected $default = null;

    /**
     * @var bool
     */
    protected $unsigned = false;

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
     */
    public function bigInteger()
    {
        $this->setType('bigInteger');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function binary()
    {
        $this->setType('binary');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function boolean()
    {
        $this->setType('boolean');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function char(int $length = 255)
    {
        $this->setType('char', ['length' => 255]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function date()
    {
        $this->setType('date');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dateTime()
    {
        $this->setType('dateTime');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function decimal(int $total = 8, int $places = 2)
    {
        $this->setType('decimal', ['total' => $total, 'places' => $places]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function double(?int $total = null, ?int $places = null)
    {
        $this->setType('double', ['total' => $total, 'places' => $places]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function enum(array $enums)
    {
        $this->setType('enum', ['enums' => $enums]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function float()
    {
        $this->setType('float');

        return $this;
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
     */
    public function json()
    {
        $this->setType('json');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function longText()
    {
        $this->setType('longText');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function mediumInteger()
    {
        $this->setType('mediumInteger');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function mediumText()
    {
        $this->setType('mediumText');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function smallInteger()
    {
        $this->setType('smallInteger');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function tinyInteger()
    {
        $this->setType('tinyInteger');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function string(int $length = 255)
    {
        $this->setType('string', ['length' => $length]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function text()
    {
        $this->setType('text');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function time()
    {
        $this->setType('time');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function timestamp()
    {
        $this->setType('timestamp');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function nullable()
    {
        $this->nullable = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function default($value)
    {
        $this->default = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function unsigned()
    {
        $this->unsigned = true;

        return $this;
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
            'nullable' => $this->nullable,
            'default' => $this->default,
            'unsigned' => $this->unsigned,
            'unique' => null,
            'primary' => null,
            'index' => null,
            'foreign' => null,
            'increments' => false,
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
