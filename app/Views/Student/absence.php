<div class="container">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"><?= $title; ?> : <?= $active['ay']; ?>/<?= $active['semester']; ?></h2> <br />
    </div>

    <table id="example1" class="table table-bordered table-striped">
        <tr class="bg-success text-center">
            <td rowspan="2">#</td>
            <td rowspan="2">Code</td>
            <td rowspan="2">Course</td>
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
        $sks = 0;
        foreach ($courses as $key => $v) {
            $sks = $sks + $v['sks'] ?>
            <tr class="text-center">
                <td><?= $i++ ?>
                </td>
                <td><?= $v['code_courses'] ?></td>
                <td><?= $v['courses'] ?></td>
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