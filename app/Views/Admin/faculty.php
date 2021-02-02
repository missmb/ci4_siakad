<div class="container">
<div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br/>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-faculty"><i class="fas fa-plus"></i> Add
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
                            <th>Faculty</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($faculty as $key => $fa) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $fa['faculty'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-target="#edit-faculty-<?= $fa['id_faculty'] ?>" data-toggle="modal"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"data-target="#delete-faculty-<?= $fa['id_faculty'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="add-faculty">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Faculty</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <?= form_open('faculty/add'); ?>
                <div class="form-group">
                    <label for="">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" placeholder="Faculty" required>
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

<?php foreach ($faculty as $key => $fa) { ?>
<div class="modal fade" id="edit-faculty-<?= $fa['id_faculty'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Faculty</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <?= form_open('faculty/edit/' . $fa['id_faculty']); ?>
                <div class="form-group">
                    <label for="">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" value="<?= $fa['faculty'] ?>" required>
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
<?php } ?>


<?php foreach ($faculty as $key => $fa) { ?>
<div class="modal fade" id="delete-faculty-<?= $fa['id_faculty'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Faculty</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $fa['faculty'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('faculty/delete/' . $fa['id_faculty']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>