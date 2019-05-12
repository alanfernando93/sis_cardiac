<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal $personal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Personal'), ['action' => 'edit', $personal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Personal'), ['action' => 'delete', $personal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personal'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Register'), ['controller' => 'Register', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Register'), ['controller' => 'Register', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personal view large-9 medium-8 columns content">
    <h3><?= h($personal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($personal->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($personal->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($personal->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($personal->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $personal->has('user') ? $this->Html->link($personal->user->id, ['controller' => 'Users', 'action' => 'view', $personal->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($personal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($personal->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($personal->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitors') ?></h4>
        <?php if (!empty($personal->monitors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Personal Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($personal->monitors as $monitors): ?>
            <tr>
                <td><?= h($monitors->id) ?></td>
                <td><?= h($monitors->description) ?></td>
                <td><?= h($monitors->created) ?></td>
                <td><?= h($monitors->modified) ?></td>
                <td><?= h($monitors->personal_id) ?></td>
                <td><?= h($monitors->patient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Monitors', 'action' => 'view', $monitors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Monitors', 'action' => 'edit', $monitors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Monitors', 'action' => 'delete', $monitors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Register') ?></h4>
        <?php if (!empty($personal->register)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Family Mobile') ?></th>
                <th scope="col"><?= __('Family Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Personal Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($personal->register as $register): ?>
            <tr>
                <td><?= h($register->id) ?></td>
                <td><?= h($register->code) ?></td>
                <td><?= h($register->family_mobile) ?></td>
                <td><?= h($register->family_name) ?></td>
                <td><?= h($register->created) ?></td>
                <td><?= h($register->modified) ?></td>
                <td><?= h($register->personal_id) ?></td>
                <td><?= h($register->patient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Register', 'action' => 'view', $register->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Register', 'action' => 'edit', $register->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Register', 'action' => 'delete', $register->id], ['confirm' => __('Are you sure you want to delete # {0}?', $register->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
