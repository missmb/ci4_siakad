<div class="container">
        <div class="content">
                <h2 class="m-0 text-dark mt-3"><?= $title; ?> : <?= $active['ay']; ?>/<?= $active['semester']; ?></h2> <br />
        </div>

        <div class="col-sm-12">
                <div class="card card-success">
                        <div class="card-header">
                                <h3 class="card-title"><?= $title; ?> <label><?= $title; ?></label></h3>
                                <div class="card-tools">
                                        <a href="<?= base_url(''); ?>" class="btn btn-tool"><i class="fas fa-reply"></i> Back
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

                                <div class="row">
                                        <div class="col-sm-4 text-center">
                                                <img src="<?= base_url('img/student/' . $student['cover_sdn']); ?>" class="img-circle" width="230px" height="230px">
                                        </div>
                                        <div class="col-sm-8">
                                                <table id="example1" class="table table-bordered table-striped">
                                                        <tr>
                                                                <th width="150px">Academic Year</th>
                                                                <td width="30px"> : </td>
                                                                <td><?= $active['ay']; ?>/<?= $active['semester']; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>NIM</th>
                                                                <td> : </td>
                                                                <td><?= $student['nim'] ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>Name</th>
                                                                <td> : </td>
                                                                <td><?= $student['student_name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>Faculty</th>
                                                                <td> : </td>
                                                                <td><?= $student['faculty'] ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>Program Study</th>
                                                                <td> : </td>
                                                                <td><?= $student['prodi'] ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>Class</th>
                                                                <td> : </td>
                                                                <td><?= $student['class_name'] ?>-<?= $student['class_year'] ?></td>
                                                        </tr>
                                                        <tr>
                                                                <th>Chief of Prodi</th>
                                                                <td> : </td>
                                                                <td><?= $student['lecture_name'] ?></td>
                                                        </tr>
                                                </table>
                                        </div>
                                </div>

                                <br>
                                <table id="example1" class="table table-bordered table-striped">
                                        <tr class="bg-success text-center">
                                                <td width="10px">#</td>
                                                <td width="10px">Code</td>
                                                <td width="50px">Course</td>
                                                <td width="10px">SKS</td>
                                                <td width="30px">SMT</td>
                                                <td width="30px">Score</td>
                                                <td width="30px">Weight</td>
                                        </tr>

                                        <?php $i = 1;
                                        $sks = 0;
                                        $grandtotal = 0;
                                        foreach ($courses as $key => $v) {
                                                $sks = $sks + $v['sks'];
                                                $weight = $v['sks'] * $v['weight']; 
                                               echo $grandtotal = $weight + $weight ;?>
                                                <tr class="text-center">
                                                        <td><?= $i++ ?>
                                                        </td>
                                                        <td><?= $v['code_courses'] ?></td>
                                                        <td><?= $v['courses'] ?>
                                                        </td>
                                                        <td><?= $v['sks'] ?></td>
                                                        <td><?= $v['smt'] ?></td>
                                                        <td><?= $v['word_score'] ?></td>
                                                        <td><?= $v['weight'] ?></td>
                                                </tr>
                                        <?php } ?>
                                </table>
                                <div class="row bg-gray">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3">
                                                <h5><b>Total SKS : </b></h5>
                                        </div>
                                        <div class="col-sm-7">
                                                <h5><?= $sks ?></h5>
                                        </div>
                                </div>
                                <div class="row bg-mute">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3">
                                                <h5><b>Total GPA : </b></h5>
                                        </div>
                                        <div class="col-sm-7">
                                                <h5><?php if(empty($courses)) {
                                                        echo '0';
                                                } else {
                                                        echo number_format($grandtotal / $sks, 2);
                                                }?>
                                                </h5>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>