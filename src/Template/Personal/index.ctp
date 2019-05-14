<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal[]|\Cake\Collection\CollectionInterface $personal
 */
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= __('Personal') ?></h1>
  <?=
  $this->Html->link('<i class="fas fa-plus-circle fa-lg text-white-50"></i> ' . __('Añadir'), ['controller' => 'personal', 'action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm', 'escape' => false])
  ?>
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
            <th scope="col"><?= $this->Paginator->sort('position') ?></th>
            <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('position') ?></th>
            <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"></th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($personal as $personal): ?>
            <tr>
              <td><?= $this->Number->format($personal->id) ?></td>
              <td><?= h($personal->position) ?></td>
              <td><?= h($personal->mobile) ?></td>
              <td><?= h($personal->email) ?></td>
              <td><?= h($personal->created) ?></td>
              <td>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-eye']), ['action' => 'view', $personal->id], ['escape' => false]) ?>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-pen']), ['action' => 'edit', $personal->id], ['escape' => false]) ?>
                <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fas fa-trash']), ['action' => 'delete', $personal->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $personal->id)]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

