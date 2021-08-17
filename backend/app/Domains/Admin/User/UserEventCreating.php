<?php

declare(strict_types=1);

namespace App\Domains\Admin\User;

use App\Domains\Admin\Profile\ProfileRepository;
use App\Domains\Admin\User;
use Devitools\Exceptions\ErrorValidation;

/**
 * Class UserEventCreating
 *
 * @package App\Domains\Admin\User
*/

class UserEventCreating
{
    /**
     * @throws ErrorValidation
     */
    public function __construct(User $user)
    {
        $profileRepository = ProfileRepository::instance();

        $profileId = $profileRepository->getDefault();

        if($profileId){
            throw new ErrorValidation([
                'profile' => 'required'
            ]);
        }

        $user->setValue('profileId', $profileId);
    }

}
