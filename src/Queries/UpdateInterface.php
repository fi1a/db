<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос на обновление
 */
interface UpdateInterface extends
    ActionInterface,
    WhereActionInterface,
    LimitActionInterface,
    TableNameActionInterface,
    ExecutableInterface
{
    /**
     * Задает значение для обновления колонки
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function value(string $column, $value);

    /**
     * Задает значения для обновления
     *
     * @param array<string, mixed> $value
     *
     * @return $this
     */
    public function values(array $value);
}
