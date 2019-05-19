<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>

<div class="container">
  <div class="row">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= __('Nuevo Paciente') ?></h1>
    </div>
  </div>
  <?= $this->Form->create($patient) ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Datos Personales</div>
        <div class="card-body">
          <?php
          echo $this->Form->control('user.first_name', ['label' => __('Nombre')]);
          echo $this->Form->control('user.last_name', ['label' => __('Apellidos')]);
          echo $this->Form->control('user.age', ['label' => __('Edad')]);
          echo $this->Form->control('user.ci', ['label' => __('Carnet de identidad')]);
          echo $this->Form->control('user.phone', ['label' => __('Telefono')]);
          echo $this->Form->control('user.city', ['label' => __('Cuidad')]);
          echo $this->Form->control('user.province', ['label' => __('Provincia')]);
          ?>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><?= _('Datos de Familiar') ?></div>
        <div class="card-body">
          <?php
          echo $this->Form->control('code', ['label' => __('Codigo')]);
          echo $this->Form->control('family_name', ['label' => __('Nombre Completo')]);
          echo $this->Form->control('family_mobile', ['label' => __('Calular')]);
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="d-sm-block align-items-center ">
      <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-success']) ?>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>