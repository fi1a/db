<?php

declare(strict_types=1);

use Fi1a\DB\Queries\Schema;
use Fi1a\DB\Queries\SchemaInterface;
use Fi1a\DI\Builder;

di()->config()->addDefinition(
    Builder::build(SchemaInterface::class)
        ->defineClass(Schema::class)
    ->getDefinition()
);
