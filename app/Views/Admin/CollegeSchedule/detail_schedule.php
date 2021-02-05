<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"><a href="<?= base_url('schedule'); ?>"><?= $title; ?> </a>
            <small><?= $prodi['prodi'] ?></small>
        </h2> <br />
    </div>

    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors  as $key => $value) { ?>
                            <ul>
                                <li><?= esc($value) ?></li>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php
                if (session()->getFlashdata('success')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('success');
                    echo '</div>';
                } ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="150px">Program Study</th>
                        <td width="30px"> : </td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Degree</th>
                        <td> : </td>
                        <td><?= $prodi['degree'] ?></td>
                    </tr>
                    <tr>
                        <th>schedule</th>
                        <td> : </td>
                        <td><?= $prodi['schedule'] ?></td>
                    </tr>
                    <tr>
                        <th>Academic Year</th>
                        <td> : </td>
                        <td><?= $active['ay'] ?>/<?= $active['semester'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-schedule"><i class="fas fa-plus"></i> Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="20px">No</th>
                            <th>Smt</th>
                            <th>Code</th>
                            <th>Courses</th>
                            <th>SKS</th>
                            <th>Class</th>
                            <th>Lecture</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Quota</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($schedule as $key => $v) { ?>
                            <tr class="text-center">
                                <td><?= $i++ ?></td>
                                <td><?= $v['smt'] ?></td>
                                <td><?= $v['code_courses'] ?></td>
                                <td><?= $v['courses'] ?></td>
                                <td><?= $v['sks'] ?></td>
                                <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                                <td><?= $v['lecture_name'] ?></td>
                                <td><?= $v['day'] ?></td>
                                <td><?= $v['time'] ?></td>
                                <td><?= $v['room'] ?></td>
                                <td><?= $v['quota'] ?></td>
                                <td><button class="btn btn-danger btn-sm"data-target="#delete-schedule-<?= $v['id_schedule'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-schedule">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Course Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('collegeschedule/add/' . $prodi['id_prodi']); ?>
                    <div class="form-group">
                        <label>Courses</label>
                        <select class="form-control" name="id_courses">
                            <option value="">-- Choose Course --</option>
                            <?php foreach ($courses as $key => $v) { ?>
                                <option value="<?= $v['id_courses'] ?>">smt <?= $v['smt'] ?> | <?= $v['sks'] ?>sks | <?= $v['courses'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-control" name="id_class">
                            <option value="">-- Choose Class --</option>
                            <?php foreach ($class as $key => $v) { ?>
                                <option value="<?= $v['id_class'] ?>"><?= $v['class_name'] ?>-<?= $v['class_year'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lecture</label>
                        <select class="form-control" name="id_lecture">
                            <option value="">-- Choose Lecture --</option>
                            <?php foreach ($lecture as $key => $v) { ?>
                                <option value="<?= $v['id_lecture'] ?>"><?= $v['lecture_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Day</label>
                                <select class="form-control" name="day">
                                    <option value="">-- Choose Day --</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thrusdaya">Thrusdaya</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Time</label>
                                <input class="form-control" type="text" name="time" placeholder="Exp 08:00-10:30">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Room</label>
                                <select class="form-control" name="id_room">
                                    <option value="">-- Choose Class --</option>
                                    <?php foreach ($room as $key => $v) { ?>
                                        <option value="<?= $v['id_room'] ?>"><?= $v['room'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Quota</label>
                                <input class="form-control" type="number" name="quota" placeholder="Quota">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('prodi'); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($schedule as $key => $v) { ?>
        <div class="modal fade" id="delete-schedule-<?= $v['id_schedule'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <schedule class="modal-title">Delete Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to Delete <b><?= $v['code_courses'] ?></b> ?
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('collegeschedule/delete/' . $v['id_schedule'] . '/' . $prodi['id_prodi']); ?>" class="btn btn-success">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>