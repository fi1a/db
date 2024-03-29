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
     * @return array<array-key, array<string, mixed>>
     */
    public function all(): array;

    /**
     * Выполняет запрос и возвращает один результат
     *
     * @return array<string, mixed>|false
     */
    public function one();
}
