<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Error\Debugger;

/**
 * Personal Controller
 *
 *
 * @method \App\Model\Entity\Personal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonalController extends AppController {

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index() {
    $personal = $this->paginate($this->Personal);

    $this->set(compact('personal'));
  }

  /**
   * View method
   *
   * @param string|null $id Personal id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null) {
    $personal = $this->Personal->get($id, [
      'contain' => []
    ]);

    $this->set('personal', $personal);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add() {
    $personal = $this->Personal->newEntity();
    if ($this->request->is('post')) {
      $personal = $this->Personal->patchEntity($personal, $this->request->getData());
      if ($this->Personal->save($personal)) {
        $this->Flash->success(__('The personal has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The personal could not be saved. Please, try again.'));
    }
    $this->set(compact('personal'));
  }

  /**
   * Edit method
   *
   * @param string|null $id Personal id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null) {
    $personal = $this->Personal->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $personal = $this->Personal->patchEntity($personal, $this->request->getData());
      if ($this->Personal->save($personal)) {
        $this->Flash->success(__('The personal has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The personal could not be saved. Please, try again.'));
    }
    $this->set(compact('personal'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Personal id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null) {
    $this->request->allowMethod(['post', 'delete']);
    $personal = $this->Personal->get($id);
    if ($this->Personal->delete($personal)) {
      $this->Flash->success(__('The personal has been deleted.'));
    } else {
      $this->Flash->error(__('The personal could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }

  public function login() {
    $hasher = new DefaultPasswordHasher();
    $this->viewBuilder()->setLayout('signin');
    if ($this->request->is('post')) {
//      $data = $this->Personal->find('all')
//              ->where([
//                'email' => $this->request->getData('email'),
//                'password' => $password
//              ])
//              ->first();
      //$user = $this->Auth->identify();
      $user = $this->Personal->identify($this->request->getData());;
      if ($user) {

        Debugger::dump($user);
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Flash->error('datos son invalidos, intente nuevamente', ['key' => 'auth', 'params' => ['class' => 'alert alert-danger']]);
      }
    }
  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

  public function beforeFilter(\Cake\Event\Event $event) {
    parent::beforeFilter($event);
  }

  public function isAuthorized($user) {
    die($user);

    return parent::isAuthorized($user);
  }

}
