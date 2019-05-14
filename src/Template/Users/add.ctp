<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Form->create($user) ?>
<fieldset>
  <legend><?= __('Add User') ?></legend>
  <?php
  echo $this->Form->control('first_name');
  echo $this->Form->control('last_name');
  echo $this->Form->control('age');
  echo $this->Form->control('ci');
  echo $this->Form->control('phone');
  echo $this->Form->control('city');
  echo $this->Form->control('province');
  ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

