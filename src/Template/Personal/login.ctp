<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <?=
              $this->Form->create(null, [
                'class' => 'user'
              ])
              ?>
              <?=
              $this->Form->control('email', [
                'type' => 'email',
                'label' => false,
                'class' => 'form-control form-control-user',
                'placeholder' => 'Enter Email Address'])
              ?>
              <?=
              $this->Form->control('password', [
                'type' => 'password',
                'label' => false,
                'class' => 'form-control form-control-user',
                'placeholder' => 'Password'])
              ?>
              <?= $this->Form->button(__('Login'), ['type' => 'submit', 'class' => 'btn btn-primary btn-user btn-block']); ?>
              <?= $this->Form->end() ?>

              <hr>
              <div class="text-center">
                <a class="small" href="/sis_cardiac/personal/add">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
