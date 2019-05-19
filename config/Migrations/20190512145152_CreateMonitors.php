<?php

use Migrations\AbstractMigration;

class CreateMonitors extends AbstractMigration {

  /**
   * Change Method.
   *
   * More information on this method is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-change-method
   * @return void
   */
  public function change() {
    $table = $this->table('monitors');
    $table->addColumn('description', 'text')
            ->addColumn('created', 'datetime', [
              'default' => null,
              'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
              'default' => null,
              'null' => false,
    ]);
    $table->create();

    $refTable = $this->table('monitors');
    $refTable->addColumn('personal_id', 'integer', ['signed' => 'disable'])
            ->addForeignKey('personal_id', 'personal', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    $refTable->addColumn('patient_id', 'integer', ['signed' => 'disable'])
            ->addForeignKey('patient_id', 'patients', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    $refTable->update();
  }

}
