<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a href="<?= base_url('admin'); ?>" class="navbar-brand">
                    <img src="<?= base_url(); ?>/templates/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-dark">SIAKAD COLLAGE</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (session()->get('role') == "1") { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('building'); ?>" class="dropdown-item">Building</a></li>
                                <li><a href="<?= base_url('room'); ?>" class="dropdown-item">Room</a></li>
                                <li><a href="<?= base_url('faculty'); ?>" class="dropdown-item">Faculty</a></li>
                                <li><a href="<?= base_url('prodi'); ?>" class="dropdown-item">Program Study</a></li>
                                <li><a href="<?= base_url('ay'); ?>" class="dropdown-item">Academic Year</a></li>
                                <li><a href="<?= base_url('courses'); ?>" class="dropdown-item">Courses</a></li>
                                <li><a href="<?= base_url('student'); ?>" class="dropdown-item">Student</a></li>
                                <li><a href="<?= base_url('lecture'); ?>" class="dropdown-item">Lecture</a></li>
                                <li><a href="<?= base_url('user'); ?>" class="dropdown-item">User</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Academic</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('classes'); ?>" class="dropdown-item">Classes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Setting</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('user'); ?>" class="dropdown-item">User</a></li>
                                <li><a href="<?= base_url('ay/setting'); ?>" class="dropdown-item">Academic Year</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav">
                    </ul>
                <?php } ?>


                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <?php if (session()->get('email') == "") { ?>
                            <li class="nav-item"><a href="<?= base_url('auth') ?>"><i class="far fa-circle nav-icon"></i>Login</a></li>
                        <?php } else { ?>
                            <li class="dropdown user-menu nav-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url('img/user/' . session()->get('cover')); ?>" class="brand-image img-circle elevation-3">
                                    <span><?= session()->get('username') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?= base_url('img/user/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                        <p>
                                            <?= session()->get('username') ?> - <?php if (session()->get('role') == 1) {
                                                                                    echo 'Admin';
                                                                                } else if (session()->get('role') == 2) {
                                                                                    echo 'Dosen';
                                                                                } else if (session()->get('role') == 3) {
                                                                                    echo 'Mahasiswa';
                                                                                } ?>
                                            <small>Member since. <?= date('Y-m-d') ?></small>
                                        </p>
                                    </li>

                                    <li class="user-footer">
                                        <div>
                                            <a href="" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>