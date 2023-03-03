<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

use Fi1a\DB\Exceptions\QueryErrorException;
use Fi1a\DB\Queries\ActionInterface;

/**
 * Абстрактный адаптер
 */
abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * Возвращает стуктуру запроса
     *
     * @param ActionInterface|array<string, mixed> $query
     *
     * @return array<string, mixed>
     *
     * @throws QueryErrorException
     */
    protected function getQuery($query): array
    {
        if ($query instanceof ActionInterface) {
            $query = $query->getStructure();
        }
        /** @psalm-suppress DocblockTypeContradiction */
        if (!is_array($query)) {
            throw new QueryErrorException('Ошибка в формате запроса');
        }
        if (!isset($query['type']) || !is_string($query['type']) || !$query['type']) {
            throw new QueryErrorException('Не передан тип запроса');
        }

        return $query;
    }
}
