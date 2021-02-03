<div class="container mt-3">

        <div class="col-sm-12">
                <div class="card card-primary">
                        <div class="card-header">
                                <h3 class="card-title"><?= $title; ?> <small><?= $prodi['prodi'] ?></small></h3>
                                <div class="card-tools">
                                        <a href="<?= base_url('courses'); ?>" type="button" class="btn btn-tool"><i class="fas fa-reply"></i> Back
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
                                                <th>Faculty</th>
                                                <td> : </td>
                                                <td><?= $prodi['faculty'] ?></td>
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
                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-courses"><i class="fas fa-plus"></i> Add
                                        </button>
                                </div>
                        </div>
                        <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                        <th width="20px">No</th>
                                                        <th class="text-center">Code</th>
                                                        <th>Courses</th>
                                                        <th class="text-center">SKS</th>
                                                        <th>Category</th>
                                                        <th class="text-center">Semester</th>
                                                        <th width="100px">Action</th>
                                                </tr>
                                        </thead>
                                        <?php $i = 1;
                                        foreach ($courses as $key => $c) { ?>
                                                <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td class="text-center"><?= $c['code_courses'] ?></td>
                                                        <td><?= $c['courses'] ?></td>
                                                        <td class="text-center"><?= $c['sks'] ?></td>
                                                        <td><?= $c['category'] ?></td>
                                                        <td class="text-center"><?= $c['smt'] ?> (<?= $c['semester'] ?>)</td>
                                                        <td class="text-center" width="50px">
                                                                <button class="btn btn-danger btn-sm" data-target="#delete-courses-<?= $c['id_courses'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                                        </td>
                                                </tr>
                                        <?php } ?>
                                        <tbody>

                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>

        <div class="modal fade" id="add-courses">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Add <?= $title ?></hh4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                </div>
                                <div class="modal-body">
                                        <?= form_open('courses/add/' . $prodi['id_prodi']); ?>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Code</label>
                                                <div class="col-sm-10">
                                                        <input type="text" name="code_courses" id="code_courses" class="form-control" placeholder="Code Courses">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Courses</label>
                                                <div class="col-sm-10">
                                                        <input type="text" name="courses" id="courses" class="form-control" placeholder="courses">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">SKS</label>
                                                <div class="col-sm-10">
                                                        <select class="form-control" name="sks">
                                                                <option value="">-- Choose SKS --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Semester</label>
                                                <div class="col-sm-10">
                                                        <select class="form-control" name="smt">
                                                                <option value="">-- Choose Semester --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10">
                                                        <select class="form-control" name="category">
                                                                <option value="">-- Choose Category --</option>
                                                                <option value="Wajib">Wajib</option>
                                                                <option value="Pilihan">Pilihan</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                </div>
                                <?= form_close() ?>
                        </div>
                </div>
        </div>

        <?php foreach ($courses as $key => $bu) { ?>
<div class="modal fade" id="delete-courses-<?= $bu['id_courses'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete courses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $bu['courses'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('courses/delete/' . $prodi['id_prodi'] . "/" . $bu['id_courses']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>