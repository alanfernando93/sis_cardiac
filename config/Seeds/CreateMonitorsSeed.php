<?php

use Migrations\AbstractSeed;

/**
 * CreateMonitors seed.
 */
class CreateMonitorsSeed extends AbstractSeed {

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
  public function run() {
    $data = [
        ["value" => "0", "time" => "2"],
        ["value" => "5", "time" => "3"],
        ["value" => "10", "time" => "3"],
        ["value" => "15", "time" => "3"],
        ["value" => "20", "time" => "4"],
        ["value" => "30", "time" => "3"],
        ["value" => "35", "time" => "5"],
        ["value" => "40", "time" => "4"],
        ["value" => "45", "time" => "3"],
        ["value" => "50", "time" => "2"],
        ["value" => "55", "time" => "4"]
    ];

    foreach ($data as $row) {
      $table = $this->table('monitors');
      $table->insert($row)->save();
    }
  }

}
