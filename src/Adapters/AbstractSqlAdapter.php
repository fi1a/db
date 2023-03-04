<?php

declare(strict_types=1);

namespace Fi1a\DB\Adapters;

/**
 * Абстрактный SQL адаптер
 */
abstract class AbstractSqlAdapter extends AbstractAdapter implements SqlAdapterInterface
{
    /**
     * @inheritDoc
     */
    public function getSql($query): string
    {
        return (string) $this->prepare($query);
    }

    /**
     * @inheritDoc
     */
    public function exec($query): bool
    {
        return $this->execSql((string) $this->prepare($query)) !== false;
    }

    /**
     * @inheritDoc
     */
    public function query($query): array
    {
        return $this->querySql((string) $this->prepare($query));
    }
}
