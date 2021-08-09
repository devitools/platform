<?php

declare(strict_types=1);

namespace App\Domains\Main;

use App\Domains\Main\Project\Deployment;
use Devitools\Agnostic\Schema;

/**
 * Class Project
 *
 * @package App\Domains\Main
 */
class Project extends Schema
{
    /**
     * The resource associated with the schema.
     *
     * @return string
     */
    public static function resource(): string
    {
        return 'projects';
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return 'main/project';
    }

    /**
     * Build the schema fields and actions.
     *
     * @return void
     */
    public function construct(): void
    {
        $this->addField('name')
            ->validationRequired();

        $this->addField('type')
            ->validationRequired();

        $this->addField('deployments')
            ->isArray(Deployment::class, 'project_id', true)
            ->withNested(['server']);
    }
}
