<?php if (isset($_GET['view'])) {

    require_once "php/conn.php";
    require_once "php/action.php";
    $id = $_GET['view'];

    $query = "SELECT * FROM report_tbl WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $report = mysqli_fetch_assoc($result);

    $imgRef = $report['report_img_ref'];
    $img_q = "SELECT * FROM img_tbl WHERE report_ref = '$imgRef'";
    $rs = mysqli_query($conn, $img_q);

?>

    <section class="h-100 p-md-5">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div class="card-body p-md-5">

                                    <div class="text-center">
                                        <h2 class="my-3">รายละเอียดร้องเรียน</h2>
                                    </div>
                                    <div class="text-start d-flex">
                                        <label class="text-muted me-2" for="rpTopic">หัวข้อ : </label>
                                        <p class="h4 font-monospace fw-bold" id="rpTopic"><?= $report['report_topic']; ?></p>
                                    </div>

                                    <div class="text-start d-flex">
                                        <label class="text-muted me-2" for="rpDate">วันที่ร้องเรียน : </label>
                                        <p class="fw-bold" id="rpDate"><?= DateThai($report['report_create_at']); ?></p>
                                    </div>

                                    <input type="hidden" name="action" value="signUp">
                                    <div class="row">
                                        <div class="col-6 col-md-6">
                                            <div class="form-outline form-white ">
                                                <input type="text" id="editFname" name="editFname" class="form-control fw-bold" value="<?= $report['report_fname']; ?>" disabled>
                                                <label class="form-label" for="editFname">ชื่อจริง</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="form-outline form-white ">
                                                <input type="text" id="editLname" name="editLname" class="form-control fw-bold" value="<?= $report['report_lname']; ?>" disabled>
                                                <label class="form-label" for="editLname">นามสกุล</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline form-white ">
                                        <input type="email" id="editEmail" name="editEmail" class="form-control fw-bold" value="<?= $report['report_email']; ?>" disabled>
                                        <label class="form-label" for="editEmail">อีเมลล์</label>
                                    </div>

                                    <div class="form-outline form-white">
                                        <input type="text" id="editTel" name="editTel" class="form-control fw-bold" value="<?= $report['report_tel']; ?>" disabled>
                                        <label class="form-label" for="editTel">เบอร์โทรศัพท์</label>
                                    </div>

                                    <div class="form-floating mb-md-4 mb-3">
                                        <textarea class="form-control h-100 pt-4" placeholder="ข้อมูลร้องเรียน" id="inputText" name="inputText" disabled><?= $report['report_topic']; ?></textarea>
                                        <label for="inputText">ข้อมูลร้องเรียน</label>
                                    </div>
                                    <form action="php/action.php" method="POST">
                                        <input type="hidden" name="action" value="editReport">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <label for="selectStatus">เปลี่ยนสถานะที่นี่</label>
                                        <select class="form-select form-select mb-3" id="selectStatus" name="selectStatus">
                                            <option value="<?= $report['report_status']; ?>" class="text-danger fw-bold" selected>สถานะตอนนี้ : <?= $report['report_status']; ?></option>
                                            <?php if ($report['report_status'] == 'รอตรวจสอบ') { ?>
                                                <option value="รับเรื่องแล้ว">รับเรื่องแล้ว</option>
                                            <?php } elseif ($report['report_status'] == 'รับเรื่องแล้ว') { ?>
                                                <option value="รอตรวจสอบ">รอตรวจสอบ</option>
                                            <?php } ?>
                                        </select>
                                        <div class="d-flex justify-content-between pt-3 pt-md-0 px-md-3 mb-3">
                                            <a href="../index.php?p=account" class="btn btn-outline-dark login-hover"><i class="fa-solid fa-arrow-left"></i> ย้อนกลับ</a>
                                            <button class="btn btn-outline-dark login-hover" type="submit">อัพเดต <i class="fa-solid fa-square-pen"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="d-block d-md-none px-3">
                                <hr class="border border-2 border-dark">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-md-3">
                                    <?php if (!$report['report_img_ref']) { ?>
                                        <div class="d-flex justify-content-center align-items-center p-5">
                                            <img src="../img/box.png" class="img-fluid" alt="Empty img">
                                        </div>
                                    <?php } else { ?>
                                        <div class="row">
                                            <?php while ($imgRows = mysqli_fetch_assoc($rs)) { ?>
                                                <div class="col-12 mb-2">
                                                    <a href="../img/upload/<?= $imgRows['img_file'] ?>" class="text-decoration-none">
                                                        <div class="card bg-dark h-100 border-0">
                                                            <img src="../img/upload/<?= $imgRows['img_file'] ?>" class="img-fluid rounded-3" alt="<?= $imgRows['img_file'] ?>">
                                                            <div class="card-footer">
                                                                <small class="text-muted"><?= $imgRows['img_file'] ?></small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php } else {
    $_SESSION['error'] = "ไม่พบหน้าดังกล่าว!";
    header("Location: ../index.php?p=account");
    exit;
} ?>