<?php

use Migrations\AbstractMigration;

class CreatePersonal extends AbstractMigration {

  /**
   * Change Method.
   *
   * More information on this method is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-change-method
   * @return void
   */
  public function change() {
    $table = $this->table('personal');
    $table->addColumn('position', 'string', ['limit' => 35])
            ->addColumn('mobile', 'string', ['limit' => 30])
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('created', 'datetime', [
              'default' => null,
              'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
              'default' => null,
              'null' => false,
    ]);
    $table->create();

    $refTable = $this->table('personal');
    $refTable->addColumn('user_id', 'integer', ['signed' => 'disable'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    $refTable->update();
  }

}
