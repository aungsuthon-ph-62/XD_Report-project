<?php

$id = $_SESSION['id'];

require_once "php/conn.php";

$query = "SELECT * FROM user_tbl WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);


?>

<div class="container px-5 py-2 py-md-5  mt-md-5">

    <div class="row shadow-lg rounded-5">

        <div class="col-12 col-md-4 d-none d-md-block bg-dark rounded-end rounded-5 p-3 p-md-5 text-light">

            <div class="text-center">

                <h1 class="mb-5">

                    <i class="fa-solid fa-address-card"></i> ข้อมูลบัญชีผู้ใช้


                </h1>
                <div class="px-5 rounded-circle">
                    <img src="../img/profilePic/user.png" class="img-fluid" alt="Avatar,XD_Report">
                </div>
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
        <div class="col-12 col-md-4 d-block d-md-none bg-dark rounded p-3 p-md-5 text-light">
            <div class="text-center">

                <h1 class="mb-3">

                    <i class="fa-solid fa-address-card"></i> ข้อมูลบัญชีผู้ใช้


                </h1>
                <div class="px-5 rounded-circle">
                    <img src="../img/profilePic/user.png" class="img-fluid" alt="Avatar,XD_Report">
                </div>
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

                    <a href="" class="btn btn-outline-light login-hover disabled">แก้ไขข้อมูลส่วนตัว <i class="fa-solid fa-sliders"></i></a>

                </div>
            </div>
        </div>



        <div class="col-12 col-md-8 p-5 bg-white rounded">
            <div class="p-md-5">
                <h2>
                <i class="fa-solid fa-box-open"></i> รายการของท่าน :
                </h2>
            </div>
            
        </div>

    </div>

</div>