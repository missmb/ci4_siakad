<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> </h2> <br />
    </div>

    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Data <?= $title; ?></h3>
                    <div class="card-tools">
                        <a href="<?= base_url('prodi'); ?>" class="btn btn-tool"><i class="fas fa-reply"></i> Back
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
                    <?= form_open('prodi/update/' . $prodi['id_prodi']); ?>
                    <div class="form-group">
                        <label>Faculty</label>
                        <select class="form-control" name="id_faculty">
                            <option value="<?= $prodi['id_faculty'] ?>"><?= $prodi['faculty'] ?></option>
                           <?php foreach ($faculty as $key => $f) { ?>
                           <option value="<?= $f['id_faculty'] ?>"><?= $f['faculty'] ?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Code Program Study</label>
                        <input class="form-control" type="text" name="code_prodi" value="<?= $prodi['code_prodi'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Program Study</label>
                        <input class="form-control" type="text" name="prodi" value="<?= $prodi['prodi'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Degree</label>
                        <select class="form-control" name="degree">
                            <option value="<?= $prodi['degree'] ?>"><?= $prodi['degree'] ?></option>
                           <option value="D1">Diploma 1</option>
                           <option value="D2">Diploma 2</option>
                           <option value="D3">Diploma 3</option>
                           <option value="D4">Diploma 4</option>
                           <option value="S1">Strata 1</option>
                           <option value="S2">Master Degree</option>
                           <option value="S3">Doctoral Degree</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chief of Program Study</label>
                        <select class="form-control" name="chief_prodi">
                            <option value="<?= $prodi['chieprodi_prodi'] ?>"><?= $prodi['chief_prodi'] ?></option>
                        <?php $i = 1; foreach ($lecture as $key => $v) { ?>
                           <option value="<?= $v['lecture_name'] ?>"><?= $v['lecture_name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('prodi'); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
