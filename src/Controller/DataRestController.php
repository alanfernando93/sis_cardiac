<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;

/**
 * DataRest Controller
 *
 *
 * @method \App\Model\Entity\DataRest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DataRestController extends AppController {

  public function initialize() {
    parent::initialize();
    $this->loadComponent('RequestHandler');
  }

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index() {
    $monitors = TableRegistry::getTableLocator()->get('Monitors');
    $data = $monitors->find()
            ->order(['id' => 'ASC']);
    if ($data->count() > 0) {
      $data->select(['x' => 'value', 'y' => 'time']);
    } else {
      $data = [['x' => '0', 'y' => '0']];
    };
    $this->jsonResponse($data);
  }

  public function update() {
    $monitors = TableRegistry::getTableLocator()->get('Monitors');
    $data = $monitors->find()
            ->order(['id' => 'DESC'])
            ->limit(1);
    $data->select(['x' => 'value', 'y' => 'time']);
    $this->jsonResponse($data);
  }

  public function jsonResponse($responseData = [], $responseStatusCode = 200) {
    \Cake\Core\Configure::write('debug', 0);
    $this->response->type('json');
    $this->response->statusCode($responseStatusCode);
    $this->response->body(json_encode($responseData));
    $this->response->send();
    $this->render(false, false);
  }

  public function beforeFilter(\Cake\Event\Event $event) {
    $this->Auth->allow(['index']);
    parent::beforeFilter($event);
  }

}
