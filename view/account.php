<?php

$id = $_SESSION['id'];

require_once "php/conn.php";
require_once "php/action.php";

$query = "SELECT * FROM user_tbl WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$rq = "SELECT * FROM report_tbl WHERE report_user_ref = '$id' ORDER BY id ASC";
$rs = mysqli_query($conn, $rq);

$i = 0;
?>

<div class="container px-md-5 py-md-5 mt-md-5">

    <div class="row shadow-lg rounded-5">

        <div class="col-12 col-md-4 d-none d-md-block bg-dark rounded-end rounded-5 p-3 p-md-5 text-light h-100">
            <div class="text-center">

                <h1 class="mb-5">

                    <i class="fa-solid fa-address-card"></i> ข้อมูลบัญชีผู้ใช้


                </h1>
                <?php if (!$user['u_img']) { ?>
                    <div class="px-5 rounded-circle">
                        <img src="../img/profilePic/user.png" class="img-fluid" alt="Avatar,XD_Report">
                    </div>
                <?php } else { ?>
                    <div class="px-5 rounded-circle">
                        <img src="../img/profilePic/<?= $user['img'] ?>" class="img-fluid" alt="Avatar,XD_Report">
                    </div>
                <?php } ?>
            </div>

            <div class="p-md-3">
                <div class="px-5 p-md-0">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-auto mb-2">
                                <p class="m-0">ชื่อ : </p>
                            </div>
                            <div class="col-auto mb-2">
                                <h5 class="m-0"> <?= $user['u_fname'] ?> <?= $user['u_lname'] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto mb-2">
                                <p class="m-0">อีเมลล์ : </p>
                            </div>
                            <div class="col-auto mb-2">
                                <h5 class="m-0"> <?= $user['u_email'] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto mb-2">
                                <p class="m-0">เบอร์โทรศัพท์ : </p>
                            </div>
                            <div class="col-auto mb-2">
                                <h5 class="m-0"> <?= $user['u_tel'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-outline-light login-hover disabled">แก้ไขข้อมูลส่วนตัว <i class="fa-solid fa-sliders"></i></a>
                </div>
            </div>

            <hr class="border border-light border-2 rounded-pill mb-3">

            <a href="php/action.php?logout" class="btn btn-outline-danger mt-3 login-hover">ออกจากระบบ</a>


        </div>
        <div class="col-12 col-md-4 d-block d-md-none bg-dark rounded p-3 p-md-5 text-light h-100">
            <div class="text-center">

                <h1 class="mb-3">

                    <i class="fa-solid fa-address-card"></i> ข้อมูลบัญชีผู้ใช้


                </h1>
                <?php if (!$user['u_img']) { ?>
                    <div class="px-5 rounded-circle">
                        <img src="../img/profilePic/user.png" class="img-fluid" alt="Avatar,XD_Report" style="width: 100px;">
                    </div>
                <?php } else { ?>
                    <div class="px-5 rounded-circle">
                        <img src="../img/profilePic/<?= $user['img'] ?>" class="img-fluid" alt="Avatar,XD_Report">
                    </div>
                <?php } ?>
            </div>

            <div class="p-md-5 my-3">
                <div class="px-5 p-md-0">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">ชื่อ : </p>
                            </div>
                            <div class="col-auto">
                                <p class="m-0"> <?= $user['u_fname'] ?> <?= $user['u_lname'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">อีเมลล์ : </p>
                            </div>
                            <div class="col-auto">
                                <p class="m-0"> <?= $user['u_email'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">เบอร์โทรศัพท์ : </p>
                            </div>
                            <div class="col-auto">
                                <p class="m-0"> <?= $user['u_tel'] ?></p>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-light border-2 rounded-pill">

                    <a href="" class="btn btn-outline-light btn-sm login-hover disabled">แก้ไขข้อมูลส่วนตัว <i class="fa-solid fa-sliders"></i></a>

                </div>
            </div>
        </div>



        <div class="col-12 col-md-8 p-0 p-md-3 bg-white rounded h-100">
            <ul class="nav nav-tabs bg-light rounded" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="report-tab" data-bs-toggle="tab" data-bs-target="#report-tab-pane" type="button" role="tab" aria-controls="report-tab-pane" aria-selected="true">รายการ</button>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="?p=report">ร้องเรียน</a>
                </li>
            </ul>
            <div class="tab-content bg-light shadow" id="myTabContent">
                <div class="tab-pane fade show active h-100" id="report-tab-pane" role="tabpanel" aria-labelledby="report-tab" tabindex="0">
                    <div class="p-3 p-md-5 mb-md-5">
                        <h2>
                            <i class="fa-solid fa-box-open"></i> รายการของท่าน :
                        </h2>

                        <?php if (!$rs) { ?>
                            <div class="d-flex justify-content-center align-items-center p-3">
                                <img src="../img/box.png" class="img-fluid" alt="Empty report" style="width: 100px;">
                            </div>
                            <p class="text-center mb-3">ยังไม่มีรายการของท่านในระบบ</p>
                        <?php } else { ?>
                            <div class="table-responsive pb-5">
                                <table class="table table-hover table-bordered border-dark align-middle" id="reportTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">หัวข้อร้องเรียน</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <?php while ($rows = mysqli_fetch_assoc($rs)) {
                                        $i++; ?>
                                        <tbody class="table-group-divider">
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $rows['report_topic'];
                                                    ?>
                                                </td>
                                                <td class="text-center px-md-5">
                                                    <?php if ($rows['report_status'] == "รอตรวจสอบ") { ?>
                                                        <p class="text-bg-warning rounded-pill m-0"><?php echo $rows['report_status']; ?></p>
                                                    <?php } elseif ($rows['report_status'] == "รับเรื่องแล้ว") { ?>
                                                        <p class="text-bg-success rounded-pill m-0"><?php echo $rows['report_status']; ?></p>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="?status=<?= $rows['id'] ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-eye"></i> รายละเอียด</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



