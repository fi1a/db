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
interface ColumnInterface
{
    /**
     * Название колонки
     *
     * @return $this
     */
    public function name(string $column);

    /**
     * Увеличение идентификатора в таблице
     *
     * @return $this
     */
    public function increments();

    /**
     * BIGINT
     *
     * @return $this
     */
    public function bigInteger();

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
    public function decimal(int $total = 8, int $places = 2);

    /**
     * DOUBLE
     *
     * @return $this
     */
    public function double(?int $total = null, ?int $places = null);

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
    public function float();

    /**
     * INTEGER
     *
     * @return $this
     */
    public function integer();

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
    public function mediumInteger();

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
    public function smallInteger();

    /**
     * TINYINT
     *
     * @return $this
     */
    public function tinyInteger();

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
     * Возможно null значение
     *
     * @return $this
     */
    public function nullable();

    /**
     * Значение по умолчанию
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function default($value);

    /**
     * Установить INTEGER в UNSIGNED
     *
     * @return $this
     */
    public function unsigned();

    /**
     * Добавить уникальный ключ
     */
    public function unique(): UniqueIndexInterface;

    /**
     * Добавить первичный ключ
     */
    public function primary(): PrimaryIndexInterface;

    /**
     * Добавить индекс
     */
    public function index(): BasicIndexInterface;

    /**
     * Добавить внешний ключ
     */
    public function foreign(): ForeignIndexInterface;
}
