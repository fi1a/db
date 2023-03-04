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
     * Возвращает обработчик по типу запроса
     */
    abstract protected function getHandler(string $type): HandlerInterface;

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

    /**
     * Возвращает обработчик
     *
     * @param ActionInterface|array<string, mixed> $query
     *
     * @return mixed
     */
    protected function prepare($query)
    {
        $query = $this->getQuery($query);
        $handler = $this->getHandler((string) $query['type']);
        $handler->validate($query);

        return $handler->prepare($query);
    }
}
