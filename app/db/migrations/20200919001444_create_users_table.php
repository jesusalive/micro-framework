<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    public function up()
    {
        $this->table('users')
            ->addColumn('name', 'string', ['null' => false])
            ->create();
    }

    public function down()
    {
        $this->table('users')->drop();
    }
}
