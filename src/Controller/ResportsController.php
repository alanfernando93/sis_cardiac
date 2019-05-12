<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resports Controller
 *
 *
 * @method \App\Model\Entity\Resport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $resports = $this->paginate($this->Resports);

        $this->set(compact('resports'));
    }

    /**
     * View method
     *
     * @param string|null $id Resport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resport = $this->Resports->get($id, [
            'contain' => []
        ]);

        $this->set('resport', $resport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resport = $this->Resports->newEntity();
        if ($this->request->is('post')) {
            $resport = $this->Resports->patchEntity($resport, $this->request->getData());
            if ($this->Resports->save($resport)) {
                $this->Flash->success(__('The resport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resport could not be saved. Please, try again.'));
        }
        $this->set(compact('resport'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resport = $this->Resports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resport = $this->Resports->patchEntity($resport, $this->request->getData());
            if ($this->Resports->save($resport)) {
                $this->Flash->success(__('The resport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resport could not be saved. Please, try again.'));
        }
        $this->set(compact('resport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resport = $this->Resports->get($id);
        if ($this->Resports->delete($resport)) {
            $this->Flash->success(__('The resport has been deleted.'));
        } else {
            $this->Flash->error(__('The resport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
