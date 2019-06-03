<?php

use Migrations\AbstractMigration;

class CreateReports extends AbstractMigration {

  /**
   * Change Method.
   *
   * More information on this method is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-change-method
   * @return void
   */
  public function change() {
    $table = $this->table('reports');
    $table->addColumn('file', 'text')
            ->addColumn('description', 'text')
            ->addColumn('path', 'string', ['limit' => 250])
            ->addColumn('created', 'datetime', [
              'default' => null,
              'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
              'default' => null,
              'null' => false,
    ]);
    $table->create();

    $refTable = $this->table('reports');
    $refTable->addColumn('monitor_id', 'integer', ['signed' => 'disable'])
            ->addForeignKey('monitor_id', 'monitors', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    $refTable->update();
  }

}
