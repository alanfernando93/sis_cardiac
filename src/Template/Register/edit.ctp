<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Register $register
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $register->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $register->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Register'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personal'), ['controller' => 'Personal', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Personal'), ['controller' => 'Personal', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="register form large-9 medium-8 columns content">
    <?= $this->Form->create($register) ?>
    <fieldset>
        <legend><?= __('Edit Register') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('family_mobile');
            echo $this->Form->control('family_name');
            echo $this->Form->control('personal_id', ['options' => $personal]);
            echo $this->Form->control('patient_id', ['options' => $patients]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
