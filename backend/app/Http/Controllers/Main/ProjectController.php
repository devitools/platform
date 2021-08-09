<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use Devitools\Http\Controllers\AbstractRestController;
use App\Domains\Main\Project\ProjectRepository;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\Main
 */
class ProjectController extends AbstractRestController
{
    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository)
    {
        parent::__construct($repository);
    }
}
