<?php

declare(strict_types=1);

use Fi1a\DB\DB;
use Fi1a\DB\DBInterface;
use Fi1a\DB\Queries\Schema;
use Fi1a\DB\Queries\SchemaInterface;
use Fi1a\DI\Builder;

di()->config()->addDefinition(
    Builder::build(SchemaInterface::class)
        ->defineClass(Schema::class)
    ->getDefinition()
);

di()->config()->addDefinition(
    Builder::build(DBInterface::class)
        ->defineFactory(function () {
            static $db;

            if ($db === null) {
                $db = new DB();
            }

            return $db;
        })
        ->getDefinition()
);
