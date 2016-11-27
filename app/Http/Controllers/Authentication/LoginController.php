<?php
namespace App\Http\Controllers\Authentication;

class LoginController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\ForbiddenError;

    /**
     * @var \App\Bgmenu\Dto\Authentication\LoginDtoOutConverter
     */
    private $loginDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\Authentication\LoginDtoOutConverter $loginDtoOutConverter) {
        $this->loginDtoOutConverter = $loginDtoOutConverter;
    }

    public function __invoke() {
        if (\Auth::check()) {
            return $this->respondForbidden('Already authenticated');
        }

        $credentials = \Request::only(['email', 'password']);
        if (\Auth::attempt($credentials)) {
            $user = \Auth::getUser();
            return $this->loginDtoOutConverter->process($user);
        }

        return $this->respondForbidden('Authentication failed');
    }
}