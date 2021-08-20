<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TestMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('test', ['id' => false, 'primary_key' => [ 'user_id' ]]);
        $table->addColumn('user_id', 'integer', [ 'identity' => true ])
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->create();
    }
}
