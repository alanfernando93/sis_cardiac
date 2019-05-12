<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * CreatePersonal seed.
 */
class CreatePersonalSeed extends AbstractSeed
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
        $hasher = new DefaultPasswordHasher();
        $password = $hasher->hash('admin');
        $data = [
            'position' => 'Administrador',
            'mobile' => '12345678',
            'email' => 'admin@test.com',
            'password' => $password,
            'created' => date("Y-m-d H:i:s"),
            'modified' => date("Y-m-d H:i:s"),
            'user_id' => 1,
        ];
        
        $table = $this->table('personal');
        $table->insert($data)->save();
    }
}
