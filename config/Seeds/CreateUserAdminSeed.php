<?php
use Migrations\AbstractSeed;

/**
 * CreateUserAdmin seed.
 */
class CreateUserAdminSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'first_name' => 'admin',
            'last_name' => 'admin',
            'age' => 1,
            'ci' => 'admin',
            'phone' => '2228865',
            'city' => 'admin',
            'province' => 'admin',
            'created'    => date("Y-m-d H:i:s"),
            'modified'   => date("Y-m-d H:i:s")
        ];

        $user = $this->table('users');
        $user->insert($data)->save();
    }
}
