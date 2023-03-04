<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Facades\DB;

/**
 * Метод по выполнению запроса
 */
trait ExecutableTrait
{
    /**
     * Выполняет запрос и возвращает результат запроса
     */
    public function exec(): bool
    {
        return DB::exec($this);
    }
}
