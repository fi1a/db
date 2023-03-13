<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонка
 */
class ColumnType implements ColumnTypeInterface
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
    public function name(string $columnName)
    {
        $this->columnName = $columnName;

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
     * @psalm-suppress UnsafeInstantiation
     */
    public static function create()
    {
        return new static();
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
