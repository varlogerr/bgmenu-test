<?php

namespace App\Http\Controllers\User;

class UpdateController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $userUpdateService;
    private $userUpdateDtoOutConverter;

    public function __construct(
        \App\Bgmenu\Services\User\UpdateService $userUpdateService,
        \App\Bgmenu\Dto\User\UpdateDtoOutConverter $userUpdateDtoOutConverter
    ) {
        $this->userUpdateService = $userUpdateService;
        $this->userUpdateDtoOutConverter = $userUpdateDtoOutConverter;
    }

    public function __invoke($id) {
        $user = $this->userUpdateService->process($id, \Request::only(['name', 'email', 'phone']));
        if (! $user) {
            return $this->respondNotFound('User not found');
        }

        return $this->userUpdateDtoOutConverter->process($user);
    }
}