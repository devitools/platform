<?php

declare(strict_types=1);

use Devitools\Database\Migration\TableCreate;
use Devitools\Database\Table;

/**
 * Class ServersCreate
 */
class ServersCreate extends TableCreate
{
    /**
     * @return string
     */
    protected function table(): string
    {
        return 'servers';
    }

    /**
     * @param Table $table
     */
    protected function withStatements(Table $table): void
    {

        $table->string('name');

        $table->string('ip',20);

        $table->string('user',50);

        $table->string('key');

    }
}
