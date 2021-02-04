<div class="container">
<div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br/>
</div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-building"><i class="fas fa-plus"></i> Add
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
                            <th>building</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($building as $key => $bu) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $bu['building'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-target="#edit-building-<?= $bu['id_building'] ?>" data-toggle="modal"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"data-target="#delete-building-<?= $bu['id_building'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-building">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Building</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <?= form_open('building/add'); ?>
                <div class="form-group">
                    <label for="">building</label>
                    <input type="text" name="building" id="building" class="form-control" placeholder="Building" required>
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

<?php foreach ($building as $key => $bu) { ?>
<div class="modal fade" id="edit-building-<?= $bu['id_building'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Building</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('building/edit/' . $bu['id_building']); ?>
                <div class="form-group">
                    <label for="">building</label>
                    <input type="text" name="building" id="building" class="form-control" value="<?= $bu['building'] ?>" required>
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


<?php foreach ($building as $key => $bu) { ?>
<div class="modal fade" id="delete-building-<?= $bu['id_building'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Building</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $bu['building'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('building/delete/' . $bu['id_building']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>