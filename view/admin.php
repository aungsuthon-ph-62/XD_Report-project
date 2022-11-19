<?php if ($_SESSION['role'] != "Admin") {
    $_SESSION['error'] = "No permission!";
    header('location: ../index.php');
    exit;
} else {
    $id = $_SESSION['id'];

    require_once "php/conn.php";
    require_once "php/action.php";

    $countUser = countUsers($conn);
    $countCheckStatus = countCheckStatus($conn);
    $countCheckedStatus = countCheckedStatus($conn);

    $rq = "SELECT * FROM report_tbl ORDER BY id ASC";
    $rs = mysqli_query($conn, $rq);

    $i = 0;

?>
    <main>
        <div class="container py-4">
            <header class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center justify-content-start text-white text-decoration-none">
                    <i class="fa-solid fa-gauge fs-1 me-2"></i>
                    <span class="fs-4">แดชบอร์ด</span>
                </a>
                <div class="d-none d-md-block">
                    <a href="php/action.php?logout" class="btn btn-outline-danger login-hover">ออกจากระบบ</a>
                </div>
            </header>

            <div class="row align-items-md-stretch mb-3">
                <div class="col-12 col-md-4 px-5 mb-3">
                    <div class="card bg-warning text-dark mb-3 h-100">
                        <div class="row">
                            <div class="col-5">
                                <img src="../img/file.png" class="img-fluid pt-5" alt="file">
                            </div>
                            <div class="col-7">
                                <div class="card-body mt-3">
                                    <h6 class="card-title">รอตรวจสอบ</h6>
                                    <h5 class="card-text"> : <?= $countCheckStatus['cID'] ?> รายการ</h5>
                                </div>
                                <div class="mt-3 mt-md-5">
                                    <a class="btn btn-outline-dark login-hover">รายละเอียด <i class="fa-solid fa-magnifying-glass-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 px-5 mb-3">
                    <div class="card bg-success text-white mb-3 h-100">
                        <div class="row">
                            <div class="col-5">
                                <img src="../img/check.png" class="img-fluid pt-5" alt="Check">
                            </div>
                            <div class="col-7">
                                <div class="card-body mt-3">
                                    <h6 class="card-title">รับเรื่องแล้ว</h6>
                                    <h5 class="card-text"> : <?= $countCheckedStatus['cID'] ?> รายการ</h5>
                                </div>
                                <div class="mt-3 mt-md-5">
                                    <a class="btn btn-outline-light login-hover">รายละเอียด <i class="fa-solid fa-magnifying-glass-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 px-5 mb-3">
                    <div class="card bg-info text-white mb-3 h-100">
                        <div class="row">
                            <div class="col-5">
                                <img src="../img/users-avatar.png" class="img-fluid pt-5" alt="Users">
                            </div>
                            <div class="col-7">
                                <div class="card-body mt-3">
                                    <h6 class="card-title">จำนวนสมาชิกทั้งหมด</h6>
                                    <h5 class="card-text"> : <?= $countUser['cID'] ?> คน</h5>
                                </div>
                                <div class="mt-3 mt-md-5">
                                    <a class="btn btn-outline-light login-hover">รายละเอียด <i class="fa-solid fa-magnifying-glass-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-md-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h4 class="fw-bold mb-3">รายการทั้งหมด</h4>
                    <?php if (!$rs) { ?>
                        <div class="d-flex justify-content-center align-items-center p-3">
                            <img src="../img/box.png" class="img-fluid" alt="Empty report">
                        </div>
                        <p class="text-center mb-3">ยังไม่มีรายการ</p>
                    <?php } else { ?>
                        <div class="table-responsive pb-5">
                            <table class="table table-hover table-bordered border-dark align-middle" id="reportTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">หัวข้อร้องเรียน</th>
                                        <th scope="col">ผู้ร้องเรียน</th>
                                        <th scope="col">อีเมลล์</th>
                                        <th scope="col">วันที่ร้องเรียน</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">จัดการ</th>
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
                                            <td>
                                                <?php
                                                echo $rows['report_fname'];
                                                ?>
                                                <?php
                                                echo $rows['report_lname'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $rows['report_email'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $date = DateThai($rows['report_create_at']);
                                                echo $date;
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
                                                <a href="?view=<?= $rows['id'] ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-eye"></i> รายละเอียด</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>



            <footer class="pt-3 mt-4 text-muted border-top">
                &copy; 2022
            </footer>
        </div>
    </main>
<?php } ?>


<!-- <div class="row h-100 p-5 text-bg-dark rounded-3">
    <div class="col-8">
        <h2>สมาชิกทั้งหมด</h2>
        <p></p>
        <p>คน</p>
        <button class="btn btn-outline-light float-end" type="button">รายละเอียด <i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>
    <div class="col-4">
        <img src="../img/users-avatar.png" alt="" class="img-fluid">
    </div>
</div> -->