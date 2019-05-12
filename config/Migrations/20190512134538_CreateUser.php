<?php
use Migrations\AbstractMigration;

class CreateUser extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string', ['limit' => 40])
                ->addColumn('last_name', 'string', ['limit' => 40])
                ->addColumn('age', 'integer')
                ->addColumn('ci', 'string', ['limit'=> 20])
                ->addColumn('phone', 'string', [
                    'limit' => 30,
                    'default' => null,
                    ])
                ->addColumn('city', 'string', ['limit' => 30])
                ->addColumn('province', 'string', ['limit' => 30])
                ->addColumn('created', 'datetime', [
                    'default' => null,
                    'null' => false,
                    ])
                ->addColumn('modified', 'datetime', [
                    'default' => null,
                    'null' => false,
                ]);
        $table->create();
    }
}
