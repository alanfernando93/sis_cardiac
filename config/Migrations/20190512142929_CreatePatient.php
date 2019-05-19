<?php

use Migrations\AbstractMigration;

class CreatePatient extends AbstractMigration {

  /**
   * Change Method.
   *
   * More information on this method is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-change-method
   * @return void
   */
  public function change() {
    $table = $this->table('patients');
    $table->addColumn('code', 'string', ['limit' => 10])
            ->addColumn('family_mobile', 'string', ['limit' => 20])
            ->addColumn('family_name', 'string', ['limit' => 20])
            ->addColumn('created', 'datetime', [
              'default' => null,
              'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
              'default' => null,
              'null' => false,
    ]);
    $table->create();

    $refTable = $this->table('patients');
    $refTable->addColumn('user_id', 'integer', ['signed' => 'disable'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    $refTable->update();
  }

}
