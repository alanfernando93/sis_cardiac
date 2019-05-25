<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report[]|\Cake\Collection\CollectionInterface $reports
 */
?>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= __('Reportes') ?></h1>
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
            <th scope="col"><?= $this->Paginator->sort('path') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col"><?= $this->Paginator->sort('monitor_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('path') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col"><?= $this->Paginator->sort('monitor_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($reports as $report): ?>
            <tr>
              <td><?= $this->Number->format($report->id) ?></td>
              <td><?= h($report->path) ?></td>
              <td><?= h($report->created) ?></td>
              <td><?= h($report->modified) ?></td>
              <td><?= $report->has('monitor') ? $this->Html->link($report->monitor->id, ['controller' => 'Monitors', 'action' => 'view', $report->monitor->id]) : '' ?></td>
              <td>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-eye']), ['action' => 'view', $report->id], ['escape' => false]) ?>
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-pen']), ['action' => 'edit', $report->id], ['escape' => false]) ?>
                <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fas fa-trash']), ['action' => 'delete', $report->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
