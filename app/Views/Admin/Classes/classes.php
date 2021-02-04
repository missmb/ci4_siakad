<div class="container">
    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-classes"><i class="fas fa-plus"></i> Add
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Class Name</th>
                            <th>Program Study</th>
                            <th>Supervisor</th>
                            <th>Class Year</th>
                            <th>Total</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $db = \Config\Database::connect();
                        foreach ($classes as $key => $v) {
                        $total = $db->table('student')
                        ->where('id_class', $v['id_class'])
                        ->countAllResults(); 
                        ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $v['class_name'] ?></td>
                                <td><?= $v['prodi'] ?></td>
                                <td><?= $v['lecture_name'] ?></td>
                                <td><?= $v['class_year'] ?></td>
                                <td class="text-center">
                                    <p class="label text-center bg-green"><?= $total ?></p>
                                    <a href="<?= base_url('classes/detail_class/' . $v['id_class']) ?>">Student</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-target="#edit-classes-<?= $v['id_class'] ?>" data-toggle="modal"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" data-target="#delete-classes-<?= $v['id_class'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-classes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add classes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('classes/add'); ?>
                <div class="form-group">
                    <label for="">classes</label>
                    <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Class Name" required>
                </div>
                <div class="form-group">
                    <label>Program Study</label>
                    <select class="form-control" name="id_prodi">
                        <option value="">-- Choose Program Study--</option>
                        <?php foreach ($prodi as $key => $f) { ?>
                            <option value="<?= $f['id_prodi'] ?>"><?= $f['prodi'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Supervisor</label>
                    <select class="form-control" name="id_lecture">
                        <option value="">-- Choose Supervisor--</option>
                        <?php foreach ($lecture as $key => $f) { ?>
                            <option value="<?= $f['id_lecture'] ?>"><?= $f['lecture_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Class Year</label>
                    <select class="form-control" name="class_year">
                        <option value="">-- Choose Class Year--</option>
                        <?php for ($i = date('Y'); $i >= date('Y') - 7; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?php foreach ($classes as $key => $v) { ?>
    <div class="modal fade" id="edit-classes-<?= $v['id_class'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit classes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('classes/edit/' . $v['id_class']); ?>
                    <div class="form-group">
                        <label for="">classes</label>
                        <input type="text" name="class_name" id="class_name" class="form-control" value="<?= $v['class_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Program Study</label>
                        <select class="form-control" name="id_prodi">
                            <option value="<?= $v['id_prodi'] ?>"><?= $v['prodi'] ?></option>
                            <?php foreach ($prodi as $key => $f) { ?>
                                <option value="<?= $f['id_prodi'] ?>"><?= $f['prodi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Supervisor</label>
                        <select class="form-control" name="id_lecture">
                            <option value="<?= $v['id_lecture'] ?>"><?= $v['lecture_name'] ?></option>
                            <?php foreach ($lecture as $key => $f) { ?>
                                <option value="<?= $f['id_lecture'] ?>"><?= $f['lecture_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class Year</label>
                        <select class="form-control" name="class_year">
                            <option value="<?= $v['class_year'] ?>"><?= $v['class_year'] ?></option>
                            <?php for ($i = date('Y'); $i >= date('Y') - 7; $i--) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php foreach ($classes as $key => $v) { ?>
    <div class="modal fade" id="delete-classes-<?= $v['id_class'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete classes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to Delete <b><?= $v['class_name'] ?></b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('classes/delete/' . $v['id_class']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>