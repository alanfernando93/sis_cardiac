<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\ViewBuilder;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;

/**
 * Monitors Controller
 *
 *
 * @method \App\Model\Entity\Monitor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonitorsController extends AppController {

  /**
   * View method
   *
   * @param string|null $id Monitor id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null) {
    $monitor = $this->Monitors->get($id, [
        'contain' => []
    ]);

    $this->set('monitor', $monitor);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add() {
    $Reports = TableRegistry::getTableLocator()->get('Reports');
    $report = $Reports->newEntity();
    $monitor = $this->Monitors->newEntity();
    if ($this->request->is('post')) {
      $monitor = $this->Monitors->patchEntity($monitor, $this->request->getData());
      $report = $Reports->patchEntity($report, $this->request->getData('report'));

//      print_r($report);
//      die();
      $monitor_all = $this->Monitors->find('all');
      $monitor_data = $monitor_all->toArray();
      $data = [];
      $data[] = ['id', 'value', 'time', 'personal_id', 'patient_id'];
      foreach ($monitor_data as $row) {
        $data[] = [
            $row['id'],
            $row['value'],
            $row['time'],
            $this->Auth->user()['id'],
            $monitor->patient_id,
        ];
      }
      if ($Reports->save($report)) {
        $this->export($data);
        $this->Monitors->deleteAll([]);
        $monitor_all->delete('Reports');
        $this->Flash->success(__('The monitor has been saved.'));
        return $this->redirect(['controller' => 'reports', 'action' => 'index']);
      }
      $this->Flash->error(__('The monitor could not be saved. Please, try again.'));
    }
    $patients = $this->Monitors->Patients->find('all')->contain(['Users']);

    $data = [];
    foreach ($patients as $patient) {
      $data[$patient['id']] = $patient['user']['first_name'] . ' ' . $patient['user']['last_name'];
    }
    $this->set(compact('monitor'));
    $this->set('patient', $data);
  }

  public function export($data) {
    $name = 'monitors-' . round(microtime(true) * 1000) . '.php';
    $_serialize = 'data';
    $_delimiter = ',';
    $_enclosure = '"';
    $_newline = '\r\n';

// Create the builder
    $builder = new ViewBuilder;
    $builder->setLayout(false)
            ->setClassName('CsvView.Csv');

// Then the view
    $view = $builder->build($data);
    $view->set(compact('data', '_serialize', '_delimiter', '_enclosure', '_newline'));

// And Save the file
    $file = new File(WWW_ROOT . 'files/' . $name, true, 0777);
    $file->write($view->render());
  }
}
