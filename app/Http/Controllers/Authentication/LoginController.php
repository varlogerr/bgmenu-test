<?php
namespace App\Http\Controllers\Authentication;

class LoginController extends \App\Http\Controllers\Controller {
    /**
     * @var \App\Bgmenu\Dto\Authentication\LoginDtoOutConverter
     */
    private $loginDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\Authentication\LoginDtoOutConverter $loginDtoOutConverter) {
        $this->loginDtoOutConverter = $loginDtoOutConverter;
    }

    public function __invoke() {
        $credentials = \Request::only(['email', 'password']);
        if (! \Auth::check() && \Auth::attempt($credentials)) {
            $user = \Auth::getUser();
            return $this->loginDtoOutConverter->process($user);
        }

        // TODO invent auth failed error
    }
}