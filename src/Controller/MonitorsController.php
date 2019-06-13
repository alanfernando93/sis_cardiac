<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\ViewBuilder;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Monitors Controller
 *
 *
 * @method \App\Model\Entity\Monitor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonitorsController extends AppController {

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index() {
    $monitors = $this->paginate($this->Monitors);

    $this->set(compact('monitors'));
  }

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
    $monitor = $this->Monitors->newEntity();
    if ($this->request->is('post')) {
      $monitor = $this->Monitors->patchEntity($monitor, $this->request->getData(), ['associated' => ['Reports']]);
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
      $this->export($data);

//      if ($this->Monitors->save($monitor)) {
//        $this->Monitors->delete($monitor_all);
//        $this->Flash->success(__('The monitor has been saved.'));
//        return $this->redirect(['action' => 'index']);
//      }
//      $this->Flash->error(__('The monitor could not be saved. Please, try again.'));
    }
    $patients = $this->Monitors->Patients->find('all')->contain(['Users']);

    $data = [];
    foreach ($patients as $patient) {
      $data[$patient['id']] = $patient['user']['first_name'] . ' ' . $patient['user']['last_name'];
    }
    $this->set(compact('monitor'));
    $this->set('patient', $data);
  }

  public function export() {
    $dir = new Folder(WWW_ROOT . 'files' . DS . 'pathtofolder', true, 0644);
    $data = [
        ['a', 'b', 'c'],
        [1, 2, 3],
        ['you', 'and', 'me'],
    ];
    // Your data array
// Params
    $_serialize = 'data';
    $_delimiter = ',';
    $_enclosure = '"';
    $_newline = '\r\n';

// Create the builder
    $builder = new ViewBuilder;
    $builder
            ->setLayout(false)
            ->setClassName('CsvView.Csv');

// Then the view
    $view = $builder->build($data);
    $view->set(compact('data', '_serialize', '_delimiter', '_enclosure', '_newline'));

// And Save the file
//    $file = new File('/home/anonymous/Documentos/test.php', true, 0777);
//    $file->write('holjlajslkfjasjfjlfñfkdj');
    $this->render(false);
  }

  /**
   * Edit method
   *
   * @param string|null $id Monitor id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null) {
    $monitor = $this->Monitors->get($id, [
        'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $monitor = $this->Monitors->patchEntity($monitor, $this->request->getData());
      if ($this->Monitors->save($monitor)) {
        $this->Flash->success(__('The monitor has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The monitor could not be saved. Please, try again.'));
    }
    $this->set(compact('monitor'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Monitor id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null) {
    $this->request->allowMethod(['post', 'delete']);
    $monitor = $this->Monitors->get($id);
    if ($this->Monitors->delete($monitor)) {
      $this->Flash->success(__('The monitor has been deleted.'));
    } else {
      $this->Flash->error(__('The monitor could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }

}
