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
                                <li><a href="<?= base_url('collegeschedule'); ?>" class="dropdown-item">Collage Schedule</a></li>
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
                <?php } else if (session()->get('role') == 2) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('ltr'); ?>" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('css'); ?>" class="dropdown-item">Course Selection Sheet</a></li>
                                <li><a href="<?= base_url('src'); ?>" class="dropdown-item">Student Record Card</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                <?php } else if (session()->get('role') == 3) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('sdn'); ?>" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Academic</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('css'); ?>" class="dropdown-item">Course Selection Sheet</a></li>
                                <li><a href="<?= base_url('src'); ?>" class="dropdown-item">Student Record Card</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                <?php } ?>


                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <?php if (session()->get('email') == "") { ?>
                            <li class="nav-item"><a href="<?= base_url('auth') ?>"><i class="far fa-circle nav-icon"></i>Login</a></li>
                        <?php } else { ?>
                            <li class="dropdown user-menu nav-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if (session()->get('role') == 1) { ?>
                                        <img src="<?= base_url('img/user/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                    <?php } else if (session()->get('role') == 2) { ?>
                                        <img src="<?= base_url('img/lecture/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                    <?php } else if (session()->get('role') == 3) { ?>
                                        <img src="<?= base_url('img/student/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                    <?php } ?>
                                    <span><?= session()->get('username') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <?php if (session()->get('role') == 1) { ?>
                                            <img src="<?= base_url('img/user/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                        <?php } else if (session()->get('role') == 2) { ?>
                                            <img src="<?= base_url('img/lecture/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                        <?php } else if (session()->get('role') == 3) { ?>
                                            <img src="<?= base_url('img/student/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                        <?php } ?>
                                        <p>
                                            <?= session()->get('username') ?> - <?php if (session()->get('role') == 1) {
                                                                                    echo 'Admin';
                                                                                } else if (session()->get('role') == 2) {
                                                                                    echo session()->get('email');
                                                                                } else if (session()->get('role') == 3) {
                                                                                    echo session()->get('email');
                                                                                } ?>
                                            <small>Member since. <?= date('Y-m-d') ?></small>
                                        </p>
                                    </li>

                                    <div class="modal-footer justify-content-between">

                                        <a href="" class="btn btn-default bg-primary">Profile</a>

                                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default bg-danger">Logout</a>
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