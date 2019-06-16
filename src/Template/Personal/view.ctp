<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personal $personal
 */
?>
<div class="container emp-profile">
  <form method="post">
    <div class="row">
      <div class="col-md-4">
        <div class="row col-md-12">
          <div class="profile-img">
            <?= $this->Html->image('profile.png') ?>
            <div class="file btn btn-lg btn-primary">
              Change Photo
              <input type="file" name="file"/>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <div class="profile-head">
              <h5>
                <?= $personal->user->first_name ?> <?= $personal->user->last_name ?>
              </h5>
              <h6>
                <?= $personal->position ?>
              </h6>
              <p class="proile-rating"></p>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?= __('Datos Personales') ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?= __('Datos Avanzados') ?></a>
                </li>
              </ul>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('User Id') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->id ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Nombres') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->first_name ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Apellidos') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->last_name ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Edad') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->age ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Carnet de Identidad') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->ci ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Telefono') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->phone ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Cuidad') ?> / <?= __('Provincia') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->user->city ?> / <?= $personal->user->province ?></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Cargo') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->position ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Celular') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->mobile ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Email') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->email ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Fecha de Creacion') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->created ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label><?= __('Fecha de Modificacion') ?></label>
                  </div>
                  <div class="col-md-6">
                    <p><?= $personal->modified ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>           
</div>