<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br />
    </div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('lecture/add') ?>" class="btn btn-tool"><i class="fas fa-plus"></i> Add
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
                            <th>Code Lecture</th>
                            <th>NIDN</th>
                            <th>Lecture Name</th>
                            <th>Password</th>
                            <th>Cover</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($lecture as $key => $v) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $v['code_lecture'] ?></td>
                                <td><?= $v['nidn'] ?></td>
                                <td><?= $v['lecture_name'] ?></td>
                                <td><?= $v['password'] ?></td>
                                <td class="text-center" width="50px"><img alt="Avatar" class="img-circle" src="img/lecture/<?= $v['cover'] ?>" width="50px" height="50px"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('lecture/edit/' . $v['id_lecture'] ) ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" data-target="#delete-lecture-<?= $v['id_lecture'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lecture as $key => $r) { ?>
<div class="modal fade" id="delete-lecture-<?= $r['id_lecture'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete lecture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $r['lecture_name'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('lecture/delete/' . $r['id_lecture']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>