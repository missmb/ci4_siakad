<div class="container">
        <div class="content">
                <h2 class="m-0 text-dark mt-3"><?= $title; ?> AY : <?= $ay['ay'] ?>/<?= $ay['semester'] ?></h2> <br />
        </div>

        <div class="row">
                <table class="table table-striped table-bordered">
                        <tr class="bg-success">
                                <th>#</th>
                                <th>Day</th>
                                <th>Course</th>
                                <th>sks</th>
                                <th>Class</th>
                                <th>Program Study</th>
                                <th>Room</th>
                                <th>Lecture</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($schedule as $key => $v) { ?>
                                <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $v['day'] ?>,<?= $v['time'] ?></td>
                                        <td><?= $v['courses'] ?></td>
                                        <td><?= $v['sks'] ?></td>
                                        <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                                        <td><?= $v['prodi'] ?></td>
                                        <td><?= $v['room'] ?></td>
                                        <td><?= $v['lecture_name'] ?></td>
                                </tr>
                        <?php } ?>
                </table>
        </div>