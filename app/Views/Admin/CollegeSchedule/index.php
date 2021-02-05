<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"><?= $title; ?> <?= $active['ay']; ?>/<?= $active['semester']; ?></h2> <br />
    </div>

    <div class="container mt-3">

        <div class="col-sm-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="card-tools">

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
                                <th>Degree</th>
                                <th>Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($prodi as $key => $v) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $v['faculty'] ?></td>
                                    <td><?= $v['code_prodi'] ?></td>
                                    <td><?= $v['prodi'] ?></td>
                                    <td><?= $v['degree'] ?></td>
                                    <td class="text-center">
                                    <a href="<?= base_url('collegeschedule/detail/' . $v['id_prodi']); ?>" class="btn btn-success btn-flat btn-sm"><i class="far fa-calendar-alt"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>