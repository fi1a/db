<?php

declare(strict_types=1);

namespace Fi1a\DB\Queries;

/**
 * Лимит запроса
 */
trait LimitActionTrait
{
    /**
     * @var int|null
     */
    protected $limit = null;

    /**
     * Лимит запроса
     *
     * @return $this
     */
    public function limit(int $limit)
    {
        $this->limit = $limit;

        return $this;
    }
}
