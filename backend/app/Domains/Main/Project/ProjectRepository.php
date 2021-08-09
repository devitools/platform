<?php

declare(strict_types=1);

namespace App\Domains\Main\Project;

use Devitools\Persistence\AbstractRepository;
use App\Domains\Main\Project;

/**
 * Class ProjectRepository
 *
 * @package App\Domains\Main\Project
 */
class ProjectRepository extends AbstractRepository
{
    /**
     * The entity class name used in repository
     *
     * @var string
     */
    protected string $prototype = Project::class;

    /**
     * @return array
     */
    public function getFilterable(): array
    {
        return ['uuid', 'name'];
    }
}
