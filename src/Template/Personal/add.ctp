<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal $personal
 */
?>
<div class="container">
  <div class="row">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= __('Nuevo Personal') ?></h1>
    </div>
  </div>
  <?= $this->Form->create($personal) ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><?= _('Datos Personales') ?></div>
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
        <div class="card-header"><?= _('Datos Personales') ?></div>
        <div class="card-body">
          <?php
          echo $this->Form->control('position', ['label' => __('Posicion'), 'options' => ['Administrador' => 'Administrador', 'Medico' => 'Medico', 'Enfermera' => 'Enfermera', 'Paramedico' => 'Paramedico']]);
          echo $this->Form->control('mobile', ['label' => __('Celular')]);
          echo $this->Form->control('email', ['label' => __('Email')]);
          echo $this->Form->control('password', ['label' => __('Password')]);
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