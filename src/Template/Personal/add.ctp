<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal $personal
 */
?>
<div class="personal form large-9 medium-8 columns content">
    <?= $this->Form->create($personal) ?>
    <fieldset>
        <legend><?= __('Nuevo Personal') ?></legend>
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
