<div class="container mt-3">

    <div class="col-sm-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title; ?></h3>
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
                            <th>Courses</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $i = 1;
                        foreach ($prodi as $key => $p) {
                            $total = $db->table('courses')
                                ->where('id_prodi', $p['id_prodi'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $p['faculty'] ?></td>
                                <td><?= $p['code_prodi'] ?></td>
                                <td><?= $p['prodi'] ?></td>
                                <td class="text-center"><?= $p['degree'] ?></td>
                                <td class="text-center">
                                <p class="label bg-green"><?= $total ?></p>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('courses/detail/' . $p['id_prodi']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-bars"></i>Courses</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>