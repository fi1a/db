<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB\Facades;

use Fi1a\DB\Facades\DB;
use PHPUnit\Framework\TestCase;

/**
 * БД
 */
class DBTest extends TestCase
{
    /**
     * @inheritDoc
     */
    public function testFacade(): void
    {
        $this->assertFalse(DB::hasConnection('connectionName'));
    }
}
