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
  <div class="container mt-3">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-file"></i> Course Selection Sheet
                    <small class="float-right"><?= date('Y M d') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              
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

              <table id="example1" class="table table-bordered table-striped">
                    <tr class="bg-success text-center">
                        <td width="10px">#</td>
                        <td width="10px">Code</td>
                        <td width="50px">Course</td>
                        <td width="10px">SKS</td>
                        <td width="30px">SMT</td>
                        <td width="30px">Class</td>
                        <td width="30px">Room</td>
                        <td width="30px">Lecture</td>
                        <td width="30px">Time</td>
                    </tr>
                    <?php $i = 1; $sks = 0;
                    foreach ($courses as $key => $v) { 
                        $sks = $sks + $v['sks'] ?>
                        <tr class="text-center">
                            <td><?= $i++ ?>
                            </td>
                            <td><?= $v['code_courses'] ?></td>
                            <td><?= $v['courses'] ?></td>
                            <td><?= $v['sks'] ?></td>
                            <td><?= $v['smt'] ?></td>
                            <td><?= $v['class_name'] ?>-<?= $v['class_year'] ?></td>
                            <td><?= $v['room'] ?></td>
                            <td><?= $v['lecture_name'] ?></td>
                            <td><?= $v['day'] ?> <?= $v['time'] ?></td>
                        </tr>
                    <?php } ?>
                </table>

              <div class="row">
                <div class="col-6">
                <div class="row">
                    <div class="col-sm-5">
                        <h5><b>Total SKS : </b></h5>
                    </div>
                    <div class="col-sm-7">
                        <h5><?= $sks ?></h5>
                    </div>
                </div>
                </div>
                <div class="col-6">
                  <p class="lead">Jombang, <?= date('Y-m-d') ?></p>
                      Chief of Academic   <br>
                      <br>
                      dt.o 
                      <br>
                      <br>
                      <br>
                      <?= $student['student_name'] ?>            
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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