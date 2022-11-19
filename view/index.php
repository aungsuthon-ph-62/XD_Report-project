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

                <h1>

                    ระบบแจ้งเรื่องร้องเรียน

                </h1>

            </div>

            <hr class="border border-2">

            <div class="p-md-5 mb-3">

                <?php if (!$_SESSION['id']) { ?>
                    <div class="px-5 p-md-0 mb-3 d-none d-md-block">
                        <h5>
                            ติดตามสถานะ <i class="fa-solid fa-circle-info"></i>
                        </h5>
                        <p>
                            สามารถคลิ๊กที่ปุ่มด้านล่างเพื่อติดตามสถานะร้องเรียนหรือสามารถเข้าสู่ระบบเพื่อเช็คสถานะร้องเรียน
                        </p>
                        <button id="btnStatus" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#chkStatusModal">ติดตามสถานะ</button>
                    </div>
                <?php } ?>
                <div class="px-5 p-md-0">

                    <h5 class="text-nowrap">

                        แจ้งปัญหาการใช้งาน <i class="fa-solid fa-bug"></i>

                    </h5>

                    <p>

                        หากระบบมีปัญหาหรือต้องการให้ผู้พัฒนาปรับปรุงส่วนไหนสามารถแจ้งได้ที่นี่

                    </p>

                    <button id="btnBug" class="btn btn-danger disabled" data-bs-toggle="modal" data-bs-target="#bugModal">แจ้งปัญหา</button>
                </div>
            </div>
            <?php if ($_SESSION['id']) { ?>
                <hr class="border border-2">
                <div class="p-5 mb-3 d-none d-md-block text-center">
                    <a href="?account" class="btn btn-outline-light login-hover">ย้อนกลับ <i class="fa-solid fa-arrow-left"></i></a>
                </div>
            <?php } ?>



            <?php if (!$_SESSION['id']) { ?>
                <div class="d-none d-sm-none d-md-block">

                    <hr class="border border-2">

                    <div class="text-center mb-3">

                        <h5 class="mb-3">

                            ระบบสมาชิก

                        </h5>

                        <a href="?p=sign-in" class="btn btn-outline-light login-hover">เข้าสู่ระบบ</a>
                        <a href="?p=sign-up" class="btn btn-outline-light login-hover">สมัครสมาชิก</a>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="col-12 col-md-4 d-block d-md-none bg-dark rounded p-3 p-md-5 text-light">

            <div class="text-center">

                <h1>

                    ระบบแจ้งเรื่องร้องเรียน

                </h1>

            </div>

            <hr class="border border-dark border-2">

            <div class="p-md-5 mb-3">

                <div class="px-5 p-md-0 mb-3 d-none d-md-block">

                    <h5>

                        ติดตามสถานะ <i class="fa-solid fa-circle-info"></i>

                    </h5>

                    <p>

                        สามารถคลิ๊กที่ปุ่มด้านล่างเพื่อติดตามสถานะร้องเรียนหรือสามารถเข้าสู่ระบบเพื่อเช็คสถานะร้องเรียน

                    </p>

                    <button id="btnStatus" class="btn btn-warning disabled" data-bs-toggle="modal" data-bs-target="#chkStatusModal">ติดตามสถานะ</button>

                </div>

                <div class="px-5 p-md-0">

                    <h5 class="text-nowrap">

                        แจ้งปัญหาการใช้งาน <i class="fa-solid fa-bug"></i>

                    </h5>

                    <p>

                        หากระบบมีปัญหาหรือต้องการให้ผู้พัฒนาปรับปรุงส่วนไหนสามารถแจ้งได้ที่นี่

                    </p>

                    <button id="btnBug" class="btn btn-danger disabled" data-bs-toggle="modal" data-bs-target="#bugModal">แจ้งปัญหา</button>

                </div>

            </div>



            <div class="d-none d-sm-none d-md-block">

                <hr class="border border-dark border-2">

                <div class="text-center mb-3">

                    <h5 class="mb-3">

                        ระบบสมาชิก

                    </h5>

                    <button id="btnLogin" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#loginModal">เข้าสู่ระบบ</button>

                    <button id="btnReg" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#regModal">สมัครสมาชิก</button>

                </div>

            </div>

        </div>



        <div class="col-12 col-md-8 p-5 bg-white rounded">
            <div class="p-md-5">
                <h2>
                    กรอกข้อมูลที่นี่ <i class="fa-sharp fa-solid fa-font-awesome"></i>
                </h2>
            </div>
            <form class="px-md-5" action="php/action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submitReport">
                <?php if (isset($_SESSION['id'])) {  ?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                <?php } ?>
                <div class="row mb-md-3">
                    <div class="form-floating col-12 col-md-6 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="inputFname" name="inputFname" placeholder="กรอกชื่อจริง" value="<?php if (isset($_GET['fname'])) {
                                                                                                                                        echo $_GET['fname'];
                                                                                                                                    } elseif ($user['u_fname']) {
                                                                                                                                        echo $user['u_fname'];
                                                                                                                                    } ?>">
                        <label for="inputFname">ชื่อจริง</label>
                    </div>
                    <div class="form-floating col-12 col-md-6 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="inputLname" name="inputLname" placeholder="กรอกนามสกุล" value="<?php if (isset($_GET['lname'])) {
                                                                                                                                        echo $_GET['lname'];
                                                                                                                                    } elseif ($user['u_lname']) {
                                                                                                                                        echo $user['u_lname'];
                                                                                                                                    } ?>">
                        <label for="inputLname">นามสกุล</label>
                    </div>
                </div>

                <div class="row mb-md-3">
                    <div class="form-floating col-12 col-md-6 mb-3 mb-md-0">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="กรอกอีเมลล์" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if (isset($_GET['email'])) {
                                                                                                                                                                                            echo $_GET['email'];
                                                                                                                                                                                        } elseif ($user['u_email']) {
                                                                                                                                                                                            echo $user['u_email'];
                                                                                                                                                                                        } ?>">
                        <label for="inputEmail">อีเมลล์</label>
                    </div>
                    <div class="form-floating col-12 col-md-6 mb-3 mb-md-0">
                        <input type="tel" class="form-control" id="inputTel" name="inputTel" placeholder="กรอกเบอร์โทรศัพท์" pattern="[0-9]{10}" value="<?php if (isset($_GET['tel'])) {
                                                                                                                                                            echo $_GET['tel'];
                                                                                                                                                        } elseif ($user['u_tel']) {
                                                                                                                                                            echo $user['u_tel'];
                                                                                                                                                        } ?>">
                        <label for="inputTel">เบอร์โทรศัพท์</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputTopic" name="inputTopic" placeholder="หัวข้อร้องเรียน" value="<?php if (isset($_GET['topic'])) {
                                                                                                                                        echo $_GET['topic'];
                                                                                                                                    } ?>">
                    <label for="inputTopic">หัวข้อร้องเรียน</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control h-100" placeholder="กรอกข้อมูลร้องเรียน" id="inputText" name="inputText"><?php if (isset($_GET['text'])) {
                                                                                                                                echo $_GET['text'];
                                                                                                                            } ?></textarea>
                    <label for="inputText">กรอกข้อมูลร้องเรียน</label>
                </div>

                <!-- uploadImg -->
                <div class="mb-3">
                    <label for="inputImg" class="form-label">เพิ่มรูปภาพที่นี่</label>
                    <input class="form-control form-control-sm" id="inputImg" name="image[]" type="file" multiple>
                </div>
                <!-- uploadImg -->

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkBox" name="checkBox">
                    <label class="form-check-label" for="checkBox">ยืนยันข้อมูล</label>
                </div>
                <button type="submit" name="submit" class="btn btn-dark mb-3 login-hover">ตกลง</button>
            </form>
        </div>

    </div>

</div>