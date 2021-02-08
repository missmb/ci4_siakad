<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> AY : <?= $ay['ay'] ?>/<?= $ay['semester'] ?></h2> <br />
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <tr class="bg-success">
                <th class="text-center" width="20px">#</th>
                <th>Code</th>
                <th>Courses</th>
                <th class="text-center" width="20px">SKS</th>
                <th>Class</th>
                <th width="50px">Score</thAbsence< /th>
            </tr>
            <?php $i = 1;
            foreach ($absence as $key => $v) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $v['code_courses'] ?></td>
                    <td><?= $v['courses'] ?></td>
                    <td class="text-center" width="20px"><?= $v['sks'] ?></td>
                    <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('ltr/score/' . $v['id_schedule']); ?>" class="btn btn-primary"><i class="fa fa-calendar"></i><a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>