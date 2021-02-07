<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | <?= $title; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body onload="window.print();">
    <div class="container">

        <div class="content">
            <h2 class="m-0 text-dark mt-3"> <?= $title; ?> <?= $schedule['class_name'] ?>-<?= $schedule['class_year'] ?></h2> <br />
        </div>

        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="<?= base_url('img/lecture/' . $schedule['cover']); ?>" class="img-circle" width="230px" height="230px">
            </div>
            <div class="col-sm-8">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th width="150px">Program Study</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Faculty</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['faculty'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Code Course</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['code_courses'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Course</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['courses'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Time</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['day'] ?>,<?= $schedule['time'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Lecture</th>
                        <td class="text-center" width="30px"> : </td>
                        <td><?= $schedule['lecture_name'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <tr class="bg-success text-center">
                <td rowspan="2">#</td>
                <td rowspan="2">NIM</td>
                <td rowspan="2">Name</td>
                <td colspan="18">Absent</td>
                <td rowspan="2">%</td>
            </tr>
            <tr class="text-center bg-success">
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
            </tr>
            <?php $i = 1;
            foreach ($student as $key => $v) { ?>
                <tr class="text-center">
                    <td><?= $i++ ?>
                    </td>
                    <td><?= $v['nim'] ?></td>
                    <td><?= $v['student_name'] ?></td>
                    <td><?php if ($v['a1'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a1'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a1'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a2'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a2'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a2'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a3'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a3'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a3'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a4'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a4'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a4'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a5'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a5'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a5'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a6'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a6'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a6'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a7'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a7'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a7'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a8'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a8'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a8'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a9'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a9'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a9'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a10'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a10'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a10'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a11'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a11'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a11'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a12'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a12'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a12'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a13'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a13'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a13'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a14'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a14'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a14'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a15'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a15'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a15'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a16'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a16'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a16'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a17'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a17'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a17'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php if ($v['a18'] == 0) {
                            echo '<i class="fa fa-times text-danger"></i>';
                        } elseif ($v['a18'] == 1) {
                            echo '<i class="fa fa-info text-warning"></i>';
                        } elseif ($v['a18'] ==  2) {
                            echo '<i class="fa fa-check text-success"></i>';
                        } ?></td>
                    <td><?php
                        $absent = ($v['a1'] + $v['a2'] + $v['a3'] + $v['a4'] +
                            $v['a5'] + $v['a6'] + $v['a7'] + $v['a8'] + $v['a9'] +
                            $v['a10'] + $v['a11'] + $v['a12'] + $v['a13'] + $v['a14'] +
                            $v['a15'] + $v['a16'] + $v['a17'] + $v['a18']) / 36 * 100;
                        echo number_format($absent, 0) . '%';
                        ?></td>
                </tr>
            <?php } ?>
        </table>

    </div>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>/templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url(); ?>/templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/templates/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/templates/dist/js/demo.js"></script>
    <!-- page script -->
</body>

</html>