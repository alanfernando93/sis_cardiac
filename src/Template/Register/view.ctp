<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Register $register
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Register'), ['action' => 'edit', $register->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Register'), ['action' => 'delete', $register->id], ['confirm' => __('Are you sure you want to delete # {0}?', $register->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Register'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Register'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personal'), ['controller' => 'Personal', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personal'), ['controller' => 'Personal', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="register view large-9 medium-8 columns content">
    <h3><?= h($register->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($register->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Mobile') ?></th>
            <td><?= h($register->family_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name') ?></th>
            <td><?= h($register->family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Personal') ?></th>
            <td><?= $register->has('personal') ? $this->Html->link($register->personal->id, ['controller' => 'Personal', 'action' => 'view', $register->personal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $register->has('patient') ? $this->Html->link($register->patient->id, ['controller' => 'Patients', 'action' => 'view', $register->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($register->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($register->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($register->modified) ?></td>
        </tr>
    </table>
</div>
