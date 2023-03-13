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
class Column extends ColumnType implements ColumnInterface
{
    /**
     * @var string|null
     */
    protected $rename;

    /**
     * @var bool
     */
    protected $nullable = false;

    /**
     * @var mixed|null
     */
    protected $default = null;

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
    public function name(string $columnName)
    {
        parent::name($columnName);
        if ($this->index) {
            $this->index->column($columnName);
        }
        if ($this->unique) {
            $this->unique->column($columnName);
        }
        if ($this->foreign) {
            $this->foreign->column($columnName);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function rename(string $columnName)
    {
        $this->rename = $columnName;

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
    public function unique(?string $name = null)
    {
        $this->unique = new UniqueIndex();
        if ($this->columnName) {
            $this->unique->column($this->columnName);
        }
        if ($name !== null) {
            $this->unique->name($name);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function primary(bool $increments = true)
    {
        $this->primary = new PrimaryIndex();

        if ($increments) {
            $this->primary->increments();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function index(?string $name = null)
    {
        $this->index = new BasicIndex();
        if ($this->columnName) {
            $this->index->column($this->columnName);
        }
        if ($name !== null) {
            $this->index->name($name);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function foreign(
        string $tableName,
        string $references,
        ?string $onDelete = null,
        ?string $onUpdate = null,
        ?string $name = null
    ) {
        $this->foreign = new ForeignIndex();
        if ($this->columnName) {
            $this->foreign->column($this->columnName);
        }
        $this->foreign->on($tableName)
            ->reference($references);
        if ($onDelete) {
            $this->foreign->onDelete($onDelete);
        }
        if ($onUpdate) {
            $this->foreign->onUpdate($onUpdate);
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
        return array_merge(parent::getStructure(), [
            'nullable' => $this->nullable,
            'default' => $this->default,
            'unique' => $this->unique ? $this->unique->getStructure() : null,
            'primary' => $this->primary ? $this->primary->getStructure() : null,
            'index' => $this->index ? $this->index->getStructure() : null,
            'foreign' => $this->foreign ? $this->foreign->getStructure() : null,
            'rename' => $this->rename,
        ]);
    }
}
