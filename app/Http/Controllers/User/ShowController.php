<?php

namespace App\Http\Controllers\User;

class ShowController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $showDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\User\ShowDtoOutConverter $showDtoOutConverter) {
        $this->showDtoOutConverter = $showDtoOutConverter;
    }

    public function __invoke($id) {
        $user = \App\User::find($id);
        if (! $user) {
            return $this->respondNotFound('User not found');
        }

        return $this->showDtoOutConverter->process($user);
    }
}