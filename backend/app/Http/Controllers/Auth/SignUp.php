<?php


namespace App\Http\Controllers\Auth;


use App\Domains\Admin\User\UserRepository;
use Devitools\Auth\Session;
use Devitools\Exceptions\ErrorUserInative;
use Devitools\Exceptions\ErrorUserUnauthorized;
use Devitools\Http\Controllers\AbstractController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class SignUp
 *
 * @package Source\Http\Controllers\Auth
 */

class SignUp extends AbstractController
{
    /**
     * @param Request $request
     * @param Session $session
     *
     * @return boolean
     * @throws ErrorUserInative
     * @throws ErrorUserUnauthorized
     * @throws Exception
     */
    public function __invoke(Request $request, Session $session): bool
    {
        $data = $request->all();
        $userRepository = UserRepository::instance();

        if(!$data['name'] || !$data['email'] || !$data['password']){
            return $this->answerFail(['name' => 'required', 'password' => 'required', 'email' => 'required']);
        }

        $userRepository->create($data);

        return true;

    }
}
