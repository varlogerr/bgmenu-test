<?php

namespace App\Http\Controllers\User;

class DeleteController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $deleteUserDtoOutConverter;
    private $deleteUserService;

    public function __construct(
        \App\Bgmenu\Dto\User\DeleteDtoOutConverter $deleteUserDtoOutConverter,
        \App\Bgmenu\Services\User\DeleteService $deleteUserService
    ) {
        $this->deleteUserDtoOutConverter = $deleteUserDtoOutConverter;
        $this->deleteUserService = $deleteUserService;
    }

    public function __invoke($id) {
        $user = $this->deleteUserService->process($id);
        if (! $user) {
            return $this->respondNotFound('User not fount');
        }

        return $this->deleteUserDtoOutConverter->process($user);
    }
}
