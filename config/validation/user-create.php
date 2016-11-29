<?php

return [
    'email'    => 'required|unique:users,email|email|max:255',
    'name'     => 'required|string|max:255',
    'phone'    => 'required|string|max:255',
    'password' => 'required|string|min:6',
];