<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Запрос на удаление
 */
interface DeleteInterface extends
    ActionInterface,
    FromActionInterface,
    WhereActionInterface,
    OrderByActionInterface,
    LimitActionInterface,
    ExecutableInterface
{
}
