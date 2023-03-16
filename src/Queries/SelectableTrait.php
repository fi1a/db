<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use Fi1a\DB\Facades\DB;

/**
 * Методы выбора значений
 */
trait SelectableTrait
{
    /**
     * Выполняет запрос и возвращает результат
     *
     * @return array<array-key, array<string, mixed>>
     */
    public function all(): array
    {
        /** @var array<array-key, array<string, mixed>> $items */
        $items = DB::query($this);

        return $items;
    }

    /**
     * Выполняет запрос и возвращает один результат
     *
     * @return array<string, mixed>|false
     */
    public function one()
    {
        $all = $this->all();

        return reset($all);
    }
}
