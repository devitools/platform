<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use Devitools\Http\Controllers\AbstractRestController;
use App\Domains\Main\Server\ServerRepository;

/**
 * Class ServerController
 *
 * @package App\Http\Controllers\Main
 */
class ServerController extends AbstractRestController
{
    /**
     * ServerController constructor.
     *
     * @param ServerRepository $repository
     */
    public function __construct(ServerRepository $repository)
    {
        parent::__construct($repository);
    }
}
