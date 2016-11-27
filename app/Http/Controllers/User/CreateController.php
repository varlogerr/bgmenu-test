<?php

namespace App\Http\Controllers\User;

class CreateController extends \App\Http\Controllers\Controller {
    /**
     * @var \App\Bgmenu\Dto\User\CreateDtoOutConverter
     */
    private $createDtoOutConverter;
    /**
     * @var \App\Bgmenu\Services\User\CreateService
     */
    private $userCreateService;

    public function __construct(
        \App\Bgmenu\Dto\User\CreateDtoOutConverter $createDtoOutConverter,
        \App\Bgmenu\Services\User\CreateService $userCreateService
    ) {
        $this->createDtoOutConverter = $createDtoOutConverter;
        $this->userCreateService = $userCreateService;
    }

    public function __invoke() {
        $user = $this->userCreateService->process(\Request::input());
        return $this->createDtoOutConverter->process($user);
    }
}