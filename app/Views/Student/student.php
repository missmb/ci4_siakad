<div class="container mt-3">

    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img src="<?= base_url('img/student/' . session()->get('cover')); ?>" alt="AdminLTE Logo" class="profile-user-img img-fluid img-circle" style="opacity: .8">
                    </div>

                    <h3 class="profile-username text-center"><?= $student['nim'] ?></h3>

                    <h3 class="profile-username text-center"><?= $student['student_name'] ?></h3>
                    <p class="text-muted text-center"><?= $student['prodi'] ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>SKS</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header with-border bg-blue text-center">
                    <h4>Biodata</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Academic Year</th>
                            <th> : </th>
                            <th><?= $ay['ay'] ?>/<?= $ay['semester'] ?></th>
                        </tr>
                        <tr>
                            <th>Faculty</th>
                            <th> : </th>
                            <th><?= $student['faculty'] ?></th>
                        </tr>
                        <tr>
                            <th>Program Study</th>
                            <th> : </th>
                            <th><?= $student['prodi'] ?></th>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <th> : </th>
                            <th><?= $student['class_name'] ?>-<?= $student['class_year'] ?></th>
                        </tr>
                        <tr>
                            <th>Instructor</th>
                            <th> : </th>
                            <th><?= $student['lecture_name'] ?></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th> : </th>
                            <th><?= $student['email'] ?></th>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <th> : </th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th> : </th>
                            <th></th>
                        </tr>
                    </table>
                </div>
            </div>