<?php

declare(strict_types=1);

namespace Hyperf\Database\Migrations;

use Hyperf\Context\ApplicationContext;
use Hyperf\Database\ConnectionResolverInterface;

/* This file will be removed in the future version. */
abstract class Migration
{
    /**
     * Enables, if supported, wrapping the migration within a transaction.
     */
    public bool $withinTransaction = true;

    /**
     * The name of the database connection to use.
     */
    protected ?string $connection = null;

    /**
     * Get the migration connection name.
     */
    public function getConnection(): string
    {
        if ($connection = $this->connection) {
            return $connection;
        }

        return ApplicationContext::getContainer()
            ->get(ConnectionResolverInterface::class)
            ->getDefaultConnection();
    }
}
