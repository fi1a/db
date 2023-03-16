<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use InvalidArgumentException;

/**
 * Логика from
 */
trait FromActionTrait
{
    /**
     * @var array{table: string|null, alias: string|null}
     */
    protected $from = [
        'table' => null,
        'alias' => null,
    ];

    /**
     * Логика from
     *
     * @return $this
     */
    public function from(string $table, ?string $alias = null)
    {
        if ($table === '') {
            throw new InvalidArgumentException(sprintf('Пустое название таблицы'));
        }
        $this->from = [
            'table'  => $table,
            'alias' => $alias,
        ];

        return $this;
    }
}
