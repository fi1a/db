<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Колонка
 */
interface ColumnInterface extends ColumnTypeInterface
{
    /**
     * Переименовать колонку
     *
     * @return $this
     */
    public function rename(string $columnName);

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
     * Добавить уникальный ключ
     *
     * @return $this
     */
    public function unique(?string $name = null);

    /**
     * Добавить первичный ключ
     *
     * @return $this
     */
    public function primary(bool $increments = true);

    /**
     * Добавить индекс
     *
     * @return $this
     */
    public function index(?string $name = null);

    /**
     * Добавить внешний ключ
     *
     * @return $this
     */
    public function foreign(
        string $tableName,
        string $references,
        ?string $onDelete = null,
        ?string $onUpdate = null,
        ?string $name = null
    );
}
