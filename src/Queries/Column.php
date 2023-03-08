<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Queries\Indexes\BasicIndex;
use Fi1a\DB\Queries\Indexes\BasicIndexInterface;
use Fi1a\DB\Queries\Indexes\ForeignIndex;
use Fi1a\DB\Queries\Indexes\ForeignIndexInterface;
use Fi1a\DB\Queries\Indexes\PrimaryIndex;
use Fi1a\DB\Queries\Indexes\PrimaryIndexInterface;
use Fi1a\DB\Queries\Indexes\UniqueIndex;
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
     * @var bool
     */
    protected $increments = false;

    /**
     * @var PrimaryIndexInterface|null
     */
    protected $primary;

    /**
     * @var BasicIndexInterface|null
     */
    protected $index;

    /**
     * @var UniqueIndexInterface|null
     */
    protected $unique;

    /**
     * @var ForeignIndexInterface|null
     */
    protected $foreign;

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
        $this->increments = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function bigInteger(bool $unsigned = false)
    {
        $this->setType('bigInteger', ['unsigned' => $unsigned]);

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
        $this->setType('char', ['length' => $length]);

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
    public function decimal(bool $unsigned = false, int $total = 8, int $places = 2)
    {
        $this->setType('decimal', ['total' => $total, 'places' => $places, 'unsigned' => $unsigned]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function double(bool $unsigned = false, ?int $total = null, ?int $places = null)
    {
        $this->setType('double', ['total' => $total, 'places' => $places, 'unsigned' => $unsigned]);

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
    public function float(bool $unsigned = false)
    {
        $this->setType('float', ['unsigned' => $unsigned]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function integer(bool $unsigned = false)
    {
        $this->setType('integer', ['unsigned' => $unsigned]);

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
    public function mediumInteger(bool $unsigned = false)
    {
        $this->setType('mediumInteger', ['unsigned' => $unsigned]);

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
    public function smallInteger(bool $unsigned = false)
    {
        $this->setType('smallInteger', ['unsigned' => $unsigned]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function tinyInteger(bool $unsigned = false)
    {
        $this->setType('tinyInteger', ['unsigned' => $unsigned]);

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
     * @psalm-suppress InvalidReturnType
     */
    public function unique(?string $name = null)
    {
        $this->unique = new UniqueIndex();
        if ($name !== null) {
            $this->unique->name($name);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function primary()
    {
        $this->primary = new PrimaryIndex();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function index(?string $name = null)
    {
        $this->index = new BasicIndex();
        if ($name !== null) {
            $this->index->name($name);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function foreign(string $tableName, string $references, ?string $action = null, ?string $name = null)
    {
        $this->foreign = new ForeignIndex();
        $this->foreign->on($tableName)
            ->references($references);
        if ($action) {
            $this->foreign->onDelete($action);
        }
        if ($name !== null) {
            $this->foreign->name($name);
        }

        return $this;
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
            'unique' => $this->unique ? $this->unique->getStructure() : null,
            'primary' => $this->primary ? $this->primary->getStructure() : null,
            'index' => $this->index ? $this->index->getStructure() : null,
            'foreign' => $this->foreign ? $this->foreign->getStructure() : null,
            'increments' => $this->increments,
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
