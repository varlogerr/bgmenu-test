<?php

namespace App\Http\Controllers\User;

class DeleteController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $deleteUserDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\User\DeleteDtoOutConverter $deleteUserDtoOutConverter) {
        $this->deleteUserDtoOutConverter = $deleteUserDtoOutConverter;
    }

    public function __invoke() {
        $user = \App\User::find(\Request::input('id'));
        if (! $user) {
            return $this->respondNotFound('User not found');
        }

        $user->delete();
        return $this->deleteUserDtoOutConverter->process($user);
    }
}
