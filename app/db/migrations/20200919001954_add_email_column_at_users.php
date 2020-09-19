<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddEmailColumnAtUsers extends AbstractMigration
{
    public function up()
    {
        $this->table('users')
            ->addColumn('email', 'string', ['null' => false])
            ->addIndex(['email'], [
                'unique' => true,
                'name' => 'idx_users_email'
            ])
            ->addTimestamps()
            ->save();
    }

    public function down()
    {
        $this->table('users')->removeColumn('email')->save();
    }
}
