<?php

namespace App\Http\Controllers\User;

class ListController extends \App\Http\Controllers\Controller  {
    /**
     * @var \App\Bgmenu\Dto\User\ListDtoOutConverter
     */
    private $listDtoConverter;

    public function __construct(\App\Bgmenu\Dto\User\ListDtoOutConverter $listDtoOutConverter) {
        $this->listDtoConverter = $listDtoOutConverter;
    }

    public function __invoke() {
        $users = \App\User::all();

        return $this->listDtoConverter->process($users);
    }
}