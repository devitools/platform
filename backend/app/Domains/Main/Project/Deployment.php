<?php

declare(strict_types=1);

namespace App\Domains\Main\Project;

use App\Domains\Main\Project;
use App\Domains\Main\Server;
use Devitools\Agnostic\Schema;

/**
 * Class Deployment
 *
 * @package App\Domains\Main\Project
 */
class Deployment extends Schema
{
    /**
     * The resource associated with the schema.
     *
     * @return string
     */
    public static function resource(): string
    {
        return 'deployments';
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return 'main/project/deployment';
    }

    /**
     * Build the schema fields and actions.
     *
     * @return void
     */
    public function construct(): void
    {
        $this->addField('server_id')
            ->isSelectRemote(Server::class, 'server')
            ->validationRequired();

        $this->addField('project_id')
            ->isSelectRemote(Project::class, 'project')
            ->validationRequired();
    }
}
