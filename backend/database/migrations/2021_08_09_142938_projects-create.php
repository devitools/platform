<?php

declare(strict_types=1);

use Devitools\Database\Migration\TableCreate;
use Devitools\Database\Table;

/**
 * Class ProjectsCreate
 */
class ProjectsCreate extends TableCreate
{
    /**
     * @return string
     */
    protected function table(): string
    {
        return 'projects';
    }

    /**
     * @param Table $table
     */
    protected function withStatements(Table $table): void
    {

        $table->string('name');
        $table->string('type');

    }
}
