<div class="container">
<div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br/>
</div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-ay"><i class="fas fa-plus"></i> Add
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
                            <th>Academic Year</th>
                            <th>Semester</th>
                            <th class="text-center">Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($ay as $key => $a) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $a['ay'] ?></td>
                                <td><?= $a['semester'] ?></td>
                                <td>
                                <?php if ($a['status'] == 0) {
                                    echo '<p class="text-center bg-red">Non-Active</p>';
                                } else {
                                    echo '<p class="text-center bg-green">Active</p>';
                                }?>
                                </td>
                                <td class="text-center">
                                <?php if ($a['status'] == 0) { ?>
                                    <a href="<?= base_url('ay/setstatus/' . $a['id_ay'] ) ?>" class="btn btn-success btn-sm"><i class="fas fa-check"-alt></i> Activation</a>
                                <?php  } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="add-ay">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Academic Year</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <?= form_open('ay/add'); ?>
                <div class="form-group">
                    <label for="">Academic Year</label>
                    <input type="text" name="ay" id="ay" class="form-control" placeholder="ay" required>
                </div>
                <div class="form-group">
                    <label for="">Semeste</label>
                    <input type="text" name="semester" id="semester" class="form-control" placeholder="Semester" required>
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

<?php foreach ($ay as $key => $a) { ?>
<div class="modal fade" id="edit-ay-<?= $a['id_ay'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit ay</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <?= form_open('ay/edit/' . $a['id_ay']); ?>
                <div class="form-group">
                    <label for="">Academic Year</label>
                    <input type="text" name="ay" id="ay" class="form-control" value="<?= $a['ay'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" value="<?= $a['semester'] ?>" required>
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


<?php foreach ($ay as $key => $a) { ?>
<div class="modal fade" id="delete-ay-<?= $a['id_ay'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Academic Year</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $a['ay'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('ay/delete/' . $a['id_ay']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>