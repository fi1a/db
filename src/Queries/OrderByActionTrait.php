<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

use InvalidArgumentException;

/**
 * Сортировать по полю
 */
trait OrderByActionTrait
{
    /**
     * @var array<string, string>
     */
    protected $orderBy = [];

    /**
     * Сортировать по полю
     *
     * @return $this
     */
    public function orderBy(string $column, string $direction = OrderByActionInterface::ASC)
    {
        if ($column === '') {
            throw new InvalidArgumentException(sprintf('Название колонки не может быть пустым'));
        }
        $direction = mb_strtoupper($direction);
        if (!in_array($direction, [OrderByActionInterface::ASC, OrderByActionInterface::DESC])) {
            throw new InvalidArgumentException(sprintf('Неизвестное значение "%s" сортировки', $direction));
        }
        $this->orderBy[$column] = $direction;

        return $this;
    }

    /**
     * Сортировать по полю
     *
     * @param array<string, string> $orderBy
     *
     * @return $this
     */
    public function setOrderBy(array $orderBy)
    {
        $this->orderBy = [];
        foreach ($orderBy as $column => $direction) {
            $this->orderBy($column, $direction);
        }

        return $this;
    }
}
