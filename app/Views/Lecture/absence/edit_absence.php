<div class="mr-3 ml-3">
    <div class="content">
        <h2 class="m-0 text-dark mt-3"> <?= $title; ?> <?= $schedule['class_name'] ?>-<?= $schedule['class_year'] ?></h2> <br />
    </div>

    <form action="<?= base_url('ltr/updateabsence/' . $schedule['id_schedule']); ?>" method="post">
        <table id="example1" class="table table-bordered table-striped text-sm">
            <tr class="bg-success text-center">
                <td rowspan="2">#</td>
                <td rowspan="2">NIM</td>
                <td rowspan="2">Name</td>
                <td colspan="18">Absent</td>
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
            foreach ($student as $key => $v) { 
                echo form_hidden($v['id_css'] . 'id_css', $v['id_css'])?>
                <tr class="text-center">
                    <td><?= $i++ ?>
                    </td>
                    <td><?= $v['nim'] ?></td>
                    <td><?= $v['student_name'] ?></td>
                    <td><select name="<?= $v['id_css'] ?>a1" id="">
                            <option value="0" <?php if ($v['a1'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a1'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a1'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a2" id="">
                            <option value="0" <?php if ($v['a2'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a2'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a2'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a3" id="">
                            <option value="0" <?php if ($v['a3'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a3'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a3'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a4" id="">
                            <option value="0" <?php if ($v['a4'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a4'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a4'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a5" id="">
                            <option value="0" <?php if ($v['a5'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a5'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a5'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a6" id="">
                            <option value="0" <?php if ($v['a6'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a6'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a6'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a7" id="">
                            <option value="0" <?php if ($v['a7'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a7'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a7'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a8" id="">
                            <option value="0" <?php if ($v['a8'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a8'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a8'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a9" id="">
                            <option value="0" <?php if ($v['a9'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a9'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a9'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a10" id="">
                            <option value="0" <?php if ($v['a10'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a10'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a10'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a11" id="">
                            <option value="0" <?php if ($v['a11'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a11'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a11'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a12" id="">
                            <option value="0" <?php if ($v['a12'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a12'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a12'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a13" id="">
                            <option value="0" <?php if ($v['a13'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a13'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a13'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a14" id="">
                            <option value="0" <?php if ($v['a14'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a14'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a14'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a15" id="">
                            <option value="0" <?php if ($v['a15'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a15'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a15'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a16" id="">
                            <option value="0" <?php if ($v['a16'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a16'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a16'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a17" id="">
                            <option value="0" <?php if ($v['a17'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['a17'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['a17'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>
                    <td><select name="<?= $v['id_css'] ?>a18" id="">
                            <option value="0" <?php if ($v['s18'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($v['s18'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($v['s18'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select></td>

                </tr>
            <?php } ?>
        </table>
        <a href="<?= base_url('ltr/absenceclass/' . $schedule['id_schedule']); ?>" class="btn btn-danger" data-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-success align-right" data-dismiss="modal">Save</button>
    </form>