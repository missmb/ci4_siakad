<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"><?= $title; ?> : <?= $active['ay']; ?>/<?= $active['semester']; ?></h2> <br />
    </div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?> <label><?= $title; ?></label></h3>
                <div class="card-tools">
                    <a href="<?= base_url(''); ?>" class="btn btn-tool"><i class="fas fa-reply"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php
                if (session()->getFlashdata('success')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('success');
                    echo '</div>';
                } ?>

                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="<?= base_url('img/student/' . $student['cover_sdn']); ?>" class="img-circle" width="230px" height="230px">
                    </div>
                    <div class="col-sm-8">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th width="150px">Academic Year</th>
                                <td width="30px"> : </td>
                                <td><?= $active['ay']; ?>/<?= $active['semester']; ?></td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td> : </td>
                                <td><?= $student['nim'] ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td> : </td>
                                <td><?= $student['student_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Faculty</th>
                                <td> : </td>
                                <td><?= $student['faculty'] ?></td>
                            </tr>
                            <tr>
                                <th>Program Study</th>
                                <td> : </td>
                                <td><?= $student['prodi'] ?></td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td> : </td>
                                <td><?= $student['class_name'] ?>-<?= $student['class_year'] ?></td>
                            </tr>
                            <tr>
                                <th>Chief of Prodi</th>
                                <td> : </td>
                                <td><?= $student['lecture_name'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <tr class="bg-success text-center">
                        <td width="10px">#</td>
                        <td width="10px">Code</td>
                        <td width="50px">Course</td>
                        <td width="10px">SKS</td>
                        <td width="30px">SMT</td>
                        <td width="30px">Class</td>
                        <td width="30px">Room</td>
                        <td width="30px">Lecture</td>
                        <td width="30px">Time</td>
                        <td width="10px"></td>
                    </tr>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('prodi'); ?>" class="btn btn-primary" data-target="#add-courses" data-toggle="modal"><i class="fa fa-plus"></i> Add Course</a>
                        <a href="<?= base_url('css/print'); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <?php $i = 1;
                    $sks = 0;
                    foreach ($courses as $key => $v) {
                        $sks = $sks + $v['sks'] ?>
                        <tr class="text-center">
                            <td><?= $i++ ?>
                            </td>
                            <td><?= $v['code_courses'] ?></td>
                            <td><?= $v['courses'] ?>
                            </td>
                            <td><?= $v['sks'] ?></td>
                            <td><?= $v['smt'] ?></td>
                            <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                            <td><?= $v['room'] ?></td>
                            <td><?= $v['lecture_name'] ?></td>
                            <td><?= $v['day'] ?> <?= $v['time'] ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-target="#delete-css-<?= $v['id_css'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="row bg-gray">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <h5><b>Total SKS : </b></h5>
                    </div>
                    <div class="col-sm-7">
                        <h5><?= $sks ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-courses">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Courses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tr class="bg-success">
                        <td width="10px">#</td>
                        <td width="10px">Code</td>
                        <td width="50px">Course</td>
                        <td width="10px">SKS</td>
                        <td width="30px">SMT</td>
                        <td width="30px">Class</td>
                        <td width="30px">Room</td>
                        <td width="30px">Lecture</td>
                        <td width="30px">Time</td>
                        <td width="30px">Quota</td>
                        <td width="30px">Action</td>
                    </tr>
                    <?php $i = 1;
                    $db = \Config\Database::connect();
                    foreach ($offering as $key => $v) {
                        $total = $db->table('css')
                            ->where('id_schedule', $v['id_schedule'])
                            ->countAllResults();
                    ?>
                        <tr class="text-center text-sm">
                            <td><?= $i++ ?></td>
                            <td><?= $v['code_courses'] ?></td>
                            <td><?= $v['courses'] ?><br>(<?= $v['code_prodi'] ?>)</td>
                            <td><?= $v['sks'] ?></td>
                            <td><?= $v['smt'] ?></td>
                            <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                            <td><?= $v['room'] ?></td>
                            <td><?= $v['lecture_name'] ?></td>
                            <td><?= $v['day'] ?> <?= $v['time'] ?></td>
                            <td><?= $total ?>/<?= $v['quota'] ?></td>
                            <td>
                                <?php if ($total == $v['quota']) { ?>
                                    <span class="label bg-danger">Full</span>
                                <?php } else { ?>
                                    <a href="<?= base_url('css/add/' . $v['id_schedule']); ?>" class="btn btn-success btn-xs btn-flat bg-green"><i class="fa fa-plus"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($courses as $key => $r) { ?>
    <div class="modal fade" id="delete-css-<?= $r['id_css'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to Delete <b><?= $r['code_courses'] ?> | <?= $r['courses'] ?></b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('css/delete/' . $r['id_css']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>