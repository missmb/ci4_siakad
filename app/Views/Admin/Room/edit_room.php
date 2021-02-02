<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br />
    </div>

    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="card-tools">
                        <a href="<?= base_url('room'); ?>" class="btn btn-tool"><i class="fas fa-reply"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                                <?php foreach ($errors  as $key => $value) { ?>
                                    <?= esc($value) ?>
                                <?php } ?>
                        </div>
                    <?php } ?>
                    <?= form_open('room/update/' . $room['id_room']); ?>
                    <div class="form-group">
                        <label>Building</label>
                        <select class="form-control" name="id_building">
                            <option value="<?= $room['id_room'] ?>"><?= $room['building'] ?></option>
                            <?php foreach ($building as $key => $bu) { ?>
                                <option value="<?= $bu['id_building'] ?>"><?= $bu['building'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Room</label>
                        <input class="form-control" value="<?= $room['room'] ?>" type="text" name="room" placeholder="Room Name" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('room'); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>