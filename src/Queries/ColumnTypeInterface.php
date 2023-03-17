<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонка
 */
interface ColumnTypeInterface extends ColumnNameInterface
{
    /**
     * BIGINT
     *
     * @return $this
     */
    public function bigInteger(bool $unsigned = false);

    /**
     * BLOB
     *
     * @return $this
     */
    public function binary();

    /**
     * BOOLEAN
     *
     * @return $this
     */
    public function boolean();

    /**
     * CHAR
     *
     * @return $this
     */
    public function char(int $length = 255);

    /**
     * DATE
     *
     * @return $this
     */
    public function date();

    /**
     * DATETIME
     *
     * @return $this
     */
    public function dateTime();

    /**
     * DECIMAL
     *
     * @return $this
     */
    public function decimal(bool $unsigned = false, int $total = 8, int $places = 2);

    /**
     * DOUBLE
     *
     * @return $this
     */
    public function double(bool $unsigned = false, ?int $total = null, ?int $places = null);

    /**
     * ENUM
     *
     * @param array<array-key, string>|array<array-key, int> $enums
     *
     * @return $this
     */
    public function enum(array $enums);

    /**
     * FLOAT
     *
     * @return $this
     */
    public function float(bool $unsigned = false);

    /**
     * INTEGER
     *
     * @return $this
     */
    public function integer(bool $unsigned = false);

    /**
     * JSON
     *
     * @return $this
     */
    public function json();

    /**
     * LONGTEXT
     *
     * @return $this
     */
    public function longText();

    /**
     * MEDIUMINT
     *
     * @return $this
     */
    public function mediumInteger(bool $unsigned = false);

    /**
     * MEDIUMTEXT
     *
     * @return $this
     */
    public function mediumText();

    /**
     * SMALLINT
     *
     * @return $this
     */
    public function smallInteger(bool $unsigned = false);

    /**
     * TINYINT
     *
     * @return $this
     */
    public function tinyInteger(bool $unsigned = false);

    /**
     * VARCHAR
     *
     * @return $this
     */
    public function string(int $length = 255);

    /**
     * TEXT
     *
     * @return $this
     */
    public function text();

    /**
     * TIME
     *
     * @return $this
     */
    public function time();

    /**
     * TIMESTAMP
     *
     * @return $this
     */
    public function timestamp();

    /**
     * Возвращает структуру
     *
     * @return array{columnName: (string|null), params: (array<string, mixed>|null), type: string}
     */
    public function getStructure(): array;
}
