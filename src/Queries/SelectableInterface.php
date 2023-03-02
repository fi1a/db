<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Методы выбора значений
 */
interface SelectableInterface
{
    /**
     * Выполняет запрос и возвращает результат
     *
     * @return array<array-key, string>
     */
    public function all(): array;

    /**
     * Выполняет запрос и возвращает один результат
     *
     * @return array<string, string>|false
     */
    public function one();
}
