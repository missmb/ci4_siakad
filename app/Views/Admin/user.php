<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br />
    </div>

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-user"><i class="fas fa-plus"></i> Add
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
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors  as $key => $value) { ?>
                            <ul>
                                <li>
                                    <?= esc($value) ?>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Cover</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($user as $key => $v) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $v['username'] ?></td>
                                <td><?= $v['email'] ?></td>
                                <td><?= $v['password'] ?></td>
                                <td class="text-center" width="50px"><img alt="Avatar" class="img-circle" src="img/user/<?= $v['cover'] ?>" width="50px" height="50px"></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-target="#edit-user-<?= $v['id_user'] ?>" data-toggle="modal"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" data-target="#delete-user-<?= $v['id_user'] ?>" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-user">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('user/add'); ?>
                <div class="form-group">
                    <label for="">username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="">cover</label>
                    <input type="file" name="cover" id="cover" class="form-control" placeholder="cover">
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

<?php foreach ($user as $key => $bu) { ?>
<div class="modal fade" id="edit-user-<?= $bu['id_user'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('user/edit/' . $bu['id_user']); ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">username</label>
                    <input type="text" name="username" id="username" class="form-control col-sm-10" value="<?= $bu['username'] ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <input type="email" name="email" id="email" class="form-control col-sm-10" value="<?= $bu['email'] ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control col-sm-10" value="<?= $bu['password'] ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-center"><img alt="Avatar" class="img-circle" src="img/user/<?= $bu['cover'] ?>" width="80px" height="80px"></label>
                    <input type="file" name="cover" id="cover" class="form-control col-sm-8" value="<?= $bu['password'] ?>">
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

<?php foreach ($user as $key => $bu) { ?>
<div class="modal fade" id="delete-user-<?= $bu['id_user'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete <b><?= $bu['user'] ?></b> ? 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="<?= base_url('user/delete/' . $bu['id_user']); ?>" class="btn btn-success">Delete</a>
            </div> 
        </div>
    </div>
</div>
<?php } ?>
