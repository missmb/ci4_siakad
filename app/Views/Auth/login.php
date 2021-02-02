<div class="container mt-3">
  <div class="login-box m-auto">
    <div class="login-logo">
      <a href="<?= base_url(); ?>"><b>Login</b> SIAKAD</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errors  as $key => $value) { ?>
                <li><?= esc($value) ?></li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>

        <?php
        if (session()->getFlashdata('wrong')) {
          echo '<div class="alert alert-warning" role="alert">';
          echo session()->getFlashdata('wrong');
          echo '</div>';
        } ?>

        <?php
        if (session()->getFlashdata('logout')) {
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('logout');
          echo '</div>';
        } ?>

        <?= form_open('auth/check_login') ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <select name="role" class="form-control">
            <option value="">-- Role Access --</option>
            <option value="1">Admin</option>
            <option value="2">Dosen</option>
            <option value="3">Mahasiswa</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <button type="submit" class="btn btn-primary btn-block">LogIn</button>
        </div>
        <?= form_close() ?>

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>