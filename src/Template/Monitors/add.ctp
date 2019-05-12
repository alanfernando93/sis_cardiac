<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitor $monitor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personal'), ['controller' => 'Personal', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Personal'), ['controller' => 'Personal', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitors form large-9 medium-8 columns content">
    <?= $this->Form->create($monitor) ?>
    <fieldset>
        <legend><?= __('Add Monitor') ?></legend>
        <?php
            echo $this->Form->control('description');
            echo $this->Form->control('personal_id', ['options' => $personal]);
            echo $this->Form->control('patient_id', ['options' => $patients]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
