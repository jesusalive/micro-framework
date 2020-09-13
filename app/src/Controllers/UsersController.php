<?php

namespace Learning\Controllers;

class UsersController
{
    public function getAll()
    {
        return json_encode([
            [
                "id" => 1,
                "name" => "Matheus"
            ],
            [
                "id" => 2,
                "name" => "Fabio"
            ],
        ]);
    }
}