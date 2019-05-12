<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal $personal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $personal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personal'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Register'), ['controller' => 'Register', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Register'), ['controller' => 'Register', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personal form large-9 medium-8 columns content">
    <?= $this->Form->create($personal) ?>
    <fieldset>
        <legend><?= __('Edit Personal') ?></legend>
        <?php
            echo $this->Form->control('position');
            echo $this->Form->control('mobile');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
