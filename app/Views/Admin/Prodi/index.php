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
                    <a href="<?= base_url('prodi/add'); ?>" class="btn btn-tool"><i class="fas fa-plus"></i> Add
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Faculty</th>
                            <th>Code Prodi</th>
                            <th>Program Study</th>
                            <th class="text-center">Degree</th>
                            <th>Chief Prodi</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($prodi as $key => $r) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $r['faculty'] ?></td>
                                <td><?= $r['code_prodi'] ?></td>
                                <td><?= $r['prodi'] ?></td>
                                <td><?= $r['degree'] ?></td>
                                <td class="text-center"><?= $r['chief_prodi'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('prodi/edit/' . $r['id_prodi']) ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" data-target="#delete-prodi-<?= $r['id_prodi'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php foreach ($prodi as $key => $r) { ?>
<div class="modal fade" id="delete-prodi-<?= $r['id_prodi'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Prodi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $r['prodi'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('prodi/delete/' . $r['id_prodi']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>