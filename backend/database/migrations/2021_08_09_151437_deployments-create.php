<?php

declare(strict_types=1);

use Devitools\Database\Migration\TableCreate;
use Devitools\Database\Table;

/**
 * Class DeploymentsCreate
 */
class DeploymentsCreate extends TableCreate
{
    /**
     * @return string
     */
    protected function table(): string
    {
        return 'deployments';
    }

    /**
     * @param Table $table
     */
    protected function withStatements(Table $table): void
    {

        $table->efficientUuid('project_id');
        $table->efficientUuid('server_id');

        $table->foreign('project_id')
            ->references(__BINARY_KEY__)
            ->on('projects')
            ->onDelete('cascade');

        $table->foreign('server_id')
            ->references(__BINARY_KEY__)
            ->on('servers')
            ->onDelete('cascade');

    }
}
