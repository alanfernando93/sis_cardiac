<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Register Controller
 *
 *
 * @method \App\Model\Entity\Register[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegisterController extends AppController {

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index() {
    $register = $this->paginate($this->Register);

    $this->set(compact('register'));
  }

  /**
   * View method
   *
   * @param string|null $id Register id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null) {
    $register = $this->Register->get($id, [
      'contain' => []
    ]);

    $this->set('register', $register);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add() {
    $register = $this->Register->newEntity();
    if ($this->request->is('post')) {
      $register = $this->Register->patchEntity($register, $this->request->getData());
      if ($this->Register->save($register)) {
        $this->Flash->success(__('The register has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The register could not be saved. Please, try again.'));
    }
    $this->set(compact('register'));
  }

  /**
   * Edit method
   *
   * @param string|null $id Register id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null) {
    $register = $this->Register->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $register = $this->Register->patchEntity($register, $this->request->getData());
      if ($this->Register->save($register)) {
        $this->Flash->success(__('The register has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The register could not be saved. Please, try again.'));
    }
    $this->set(compact('register'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Register id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null) {
    $this->request->allowMethod(['post', 'delete']);
    $register = $this->Register->get($id);
    if ($this->Register->delete($register)) {
      $this->Flash->success(__('The register has been deleted.'));
    } else {
      $this->Flash->error(__('The register could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }

}
