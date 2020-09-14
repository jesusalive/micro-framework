<?php

namespace Learning\Controllers;

use Learning\Core\Res;

class UsersController
{
    public function getAll()
    {
        return Res::json([
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

    public function update($id) {
        return Res::json([
            'id' => $id,
            'name' => 'Fernandinho Beira Mar'
        ]);
    }
}