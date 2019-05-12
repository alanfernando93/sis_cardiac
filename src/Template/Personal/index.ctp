<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal[]|\Cake\Collection\CollectionInterface $personal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Personal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Register'), ['controller' => 'Register', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Register'), ['controller' => 'Register', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personal index large-9 medium-8 columns content">
    <h3><?= __('Personal') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personal as $personal): ?>
            <tr>
                <td><?= $this->Number->format($personal->id) ?></td>
                <td><?= h($personal->position) ?></td>
                <td><?= h($personal->mobile) ?></td>
                <td><?= h($personal->email) ?></td>
                <td><?= h($personal->password) ?></td>
                <td><?= h($personal->created) ?></td>
                <td><?= h($personal->modified) ?></td>
                <td><?= $personal->has('user') ? $this->Html->link($personal->user->id, ['controller' => 'Users', 'action' => 'view', $personal->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personal->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
