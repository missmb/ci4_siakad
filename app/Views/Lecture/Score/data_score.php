<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> AY : <?= $ay['ay'] ?>/<?= $ay['semester'] ?></h2> <br />
    </div>
    <?php if (session()->getFlashdata('success')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('success');
        echo '</div>';
    } ?>
    <a href="<?= base_url('ltr/updatescore/' . $absence['id_schedule']); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Print Score</a>
    <div class="row">
        <table class="table table-striped table-bordered">
            <tr>
                <th width="150px">Prodi</th>
                <td width="30px"> : </td>
                <td><?= $absence['prodi'] ?></td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td> : </td>
                <td><?= $absence['faculty'] ?></td>
            </tr>
            <tr>
                <th>Code</th>
                <td> : </td>
                <td><?= $absence['code_courses'] ?></td>
            </tr>
            <tr>
                <th>Course</th>
                <td> : </td>
                <td><?= $absence['courses'] ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td> : </td>
                <td><?= $absence['time'] ?></td>

            </tr>
            <tr>
                <th>Lecture</th>
                <td> : </td>
                <td><?= $absence['lecture_name'] ?></td>
            </tr>
        </table>
        <form action="<?= base_url('ltr/updatescore/' . $absence['id_schedule']); ?>" method="post">
            <table class="table table-bordered table-striped">
                <tr class="bg-success text-center">
                    <td rowspan="2" width="10px">NO</td>
                    <td rowspan="2" width="50px">NIM</td>
                    <td rowspan="2">Student Name</td>
                    <td colspan="7">Attended</td>
                </tr>
                <tr class="bg-success">
                    <td class="text-center">Absence(15%)</td>
                    <td width="30px">Assign(15%)</td>
                    <td width="30px">UTS(30%)</td>
                    <td width="30px">UAS(40%)</td>
                    <td width="30px" class="text-center">NA <br> (15%+15%+30%+40%)</td>
                    <td width="30px">Word</td>
                    <td width="30px">Weight</td>
                </tr>
                <?php $i = 1;
                foreach ($student as $key => $v) {
                    echo form_hidden($v['id_css'] . 'id_css', $v['id_css']); ?>
                    <!-- echo form_hidden($v['id_css'] . 'absence_score',number_format($absent, 0));?> -->
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $v['nim'] ?></td>
                        <td><?= $v['student_name'] ?></td>
                        <td class="text-center"><?php
                                                $absent = ($v['a1'] + $v['a2'] + $v['a3'] + $v['a4'] +
                                                    $v['a5'] + $v['a6'] + $v['a7'] + $v['a8'] + $v['a9'] +
                                                    $v['a10'] + $v['a11'] + $v['a12'] + $v['a13'] + $v['a14'] +
                                                    $v['a15'] + $v['a16'] + $v['a17'] + $v['a18']) / 36 * 100;
                                                echo number_format($absent, 0) . '%';
                                                echo form_hidden($v['id_css'] . 'absence_score', number_format($absent, 0));
                                                ?></td>
                        <td><input type="number" name="<?= $v['id_css'] ?>assignment_score" value="<?= $v['assignment_score'] ?>" class="form-control"></td>
                        <td><input type="number" name="<?= $v['id_css'] ?>uts_score" value="<?= $v['uts_score'] ?>" class="form-control"></td>
                        <td><input type="number" name="<?= $v['id_css'] ?>uas_score" value="<?= $v['uas_score'] ?>" class="form-control"></td>
                        <td class="text-center"><?= $v['final_score'] ?></td>
                        <td class="text-center"><?= $v['word_score'] ?></td>
                        <td class="text-center"><?= $v['weight'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <button type="submit" class="btn btn-success align-right" data-dismiss="modal">Save</button>
        </form>
        </di>