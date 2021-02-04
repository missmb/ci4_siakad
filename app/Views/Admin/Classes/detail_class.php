<div class="container">
    <div class="content">
        <h3 class="m-0 text-dark mt-3"> <?= $title; ?> </h3> <br />
    </div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?> <label><?= $class['class_name']; ?></label></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#student"><i class="fas fa-plus"></i> Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php
                if (session()->getFlashdata('success')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('success');
                    echo '</div>';
                } ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="150px">Class Name</th>
                        <td width="30px"> : </td>
                        <td><?= $class['class_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Study</th>
                        <td> : </td>
                        <td><?= $class['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Class Yer</th>
                        <td> : </td>
                        <td><?= $class['class_year'] ?></td>
                    </tr>
                    <tr>
                        <th>Total Student</th>
                        <td> : </td>
                        <td><?= $total ?></td>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td width="10px">NO</td>
                        <td width="50px">NIM</td>
                        <td>Student Name</td>
                        <td width="30px">Action</td>
                    </tr>
                    <?php $i = 1;
                    foreach ($student as $key => $v) { ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td><?= $v['nim'] ?></td>
                            <td><?= $v['student_name'] ?></td>
                            <td>
                                <a href="<?= base_url('classes/removestudentclass/' . $v['id_student'] . '/' . $class['id_class']) ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="student">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">No</th>
                            <th>NIM</th>
                            <th>Student Name</th>
                            <th>Program Study</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($null as $key => $v) { ?>
                            <tr>
                                    <?php if ($class['id_prodi'] == $v['id_prodi']) { ?>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $v['nim'] ?></td>
                                <td><?= $v['student_name'] ?></td>
                                <td><?= $v['prodi'] ?></td>
                                <td class="text-center">
                                        <a href="<?= base_url('classes/addstudentclass/' . $v['id_student'] . "/" . $class['id_class']) ?>" class="btn btn-success btn-xs"><i class="fas fa-plus"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>