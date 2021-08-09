<?php

declare(strict_types=1);

namespace App\Domains\Main\Server;

use Devitools\Persistence\AbstractRepository;
use App\Domains\Main\Server;

/**
 * Class ServerRepository
 *
 * @package App\Domains\Main\Server
 */
class ServerRepository extends AbstractRepository
{
    /**
     * The entity class name used in repository
     *
     * @var string
     */
    protected string $prototype = Server::class;

    /**
     * @return array
     */
    public function getFilterable(): array
    {
        return ['uuid', 'name'];
    }
}
