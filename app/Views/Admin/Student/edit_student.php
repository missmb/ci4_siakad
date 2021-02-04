<div class="container">
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="card-tools">
                        <a href="<?= base_url('student'); ?>" class="btn btn-tool"><i class="fas fa-reply"></i> Back
                        </a>
                    </div>
                </div>
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
                    <?= form_open_multipart('student/update/' . $student['id_student']); ?>
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" type="number" name="nim" value="<?= $student['nim'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input class="form-control" type="text" name="student_name" value="<?= $student['student_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Program Study</label>
                        <select class="form-control" name="id_prodi">
                            <option value="<?= $student['id_prodi'] ?>"><?= $student['prodi'] ?></option>
                            <?php foreach ($prodi as $key => $f) { ?>
                                <option value="<?= $f['id_prodi'] ?>"><?= $f['prodi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" value="<?= $student['password'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <div class="form-group">
                                <img src="<?= base_url('img/student/' . $student['cover'] ) ?>" id="cover_load" width="130px" height="130px">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Cover</label>
                                <input class="form-control" type="file" id="preview_cover" name="cover">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('student'); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>