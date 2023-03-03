<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Название таблицы
 */
trait TableNameActionTrait
{
    /**
     * @var string|null
     */
    protected $tableName;

    /**
     * Установить название таблицы
     *
     * @return $this
     */
    public function name(string $tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }
}
