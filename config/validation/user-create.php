<?php

return [
    'email'    => 'required|unique:users,email|email|max:255',
    'name'     => 'required|max:255',
    'phone'    => 'required|max:255',
    'password' => 'required|min:6',
];