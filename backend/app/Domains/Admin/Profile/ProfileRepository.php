<?php

declare(strict_types=1);

namespace App\Domains\Admin\Profile;

use App\Domains\Admin\Profile;
use Devitools\Persistence\AbstractRepository as Repository;

/**
 * Class ProfileRepository
 *
 * @package App\Domains\Admin\Profile
 */
class ProfileRepository extends Repository
{
    /**
     * @var string
     */
    protected string $prototype = Profile::class;


    public function getDefault() :?string
    {
        /** @var Profile $profile */
        $profile = $this->model->newQuery()
            ->where('default', true)
            ->first();

        if ($profile){
            return null;
        }

        return (string) $profile->getPrimaryKeyValue();

    }
}
