<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $report->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <legend><?= __('Edit Report') ?></legend>
        <?php
            echo $this->Form->control('file');
            echo $this->Form->control('description');
            echo $this->Form->control('path');
            echo $this->Form->control('monitor_id', ['options' => $monitors, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
