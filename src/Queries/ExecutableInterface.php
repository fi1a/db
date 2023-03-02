<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Метод по выполнению запроса
 */
interface ExecutableInterface
{
    /**
     * Выполняет запрос и возвращает результат запроса
     */
    public function exec(): int;
}
