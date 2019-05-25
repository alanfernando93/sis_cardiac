<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient[]|\Cake\Collection\CollectionInterface $patients
 */
?>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= __('Pacientes') ?></h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('code') ?></th>
            <th scope="col"><?= $this->Paginator->sort('family_mobile') ?></th>
            <th scope="col"><?= $this->Paginator->sort('family_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('code') ?></th>
            <th scope="col"><?= $this->Paginator->sort('family_mobile') ?></th>
            <th scope="col"><?= $this->Paginator->sort('family_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($patients as $patient): ?>
            <tr>
              <td><?= $this->Number->format($patient->id) ?></td>
              <td><?= h($patient->code) ?></td>
              <td><?= h($patient->family_mobile) ?></td>
              <td><?= h($patient->family_name) ?></td>
              <td><?= h($patient->created) ?></td>
              <td><?= h($patient->modified) ?></td>
              <td><?= $patient->has('user') ? $this->Html->link($patient->user->id, ['controller' => 'Users', 'action' => 'view', $patient->user->id]) : '' ?></td>
              <td>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-eye']), ['action' => 'view', $patient->id], ['escape' => false]) ?>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-pen']), ['action' => 'edit', $patient->id], ['escape' => false]) ?>
                <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fas fa-trash']), ['action' => 'delete', $patient->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>