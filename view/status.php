<?php if (isset($_GET['status'])) { ?>

    <?php
    require_once "php/conn.php";
    require_once "php/action.php";
    $id = $_GET['status'];

    $query = "SELECT * FROM report_tbl WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $report = mysqli_fetch_assoc($result);

    $imgRef = $report['report_img_ref'];
    $img_q = "SELECT * FROM img_tbl WHERE report_ref = '$imgRef'";
    $rs = mysqli_query($conn, $img_q);

    ?>


    <section class="gradient-custom">
        <div class="container py-5 h-100">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase text-start mb-5 py-3 border-bottom border-2 border-primary">รายละเอียด <i class="fa-solid fa-circle-info"></i></h2>


                            <div class="card-title mb-3">หัวข้อ : <h1><?= $report['report_topic'] ?></h1> </div>
                            <h6 class="card-subtitle mb-2 text-muted">วันที่ร้องเรียน : <?= DateThai($report['report_create_at']) ?></h6>
                            <label for="reportText">เนื้อหาที่ร้องเรียน : </label>
                            <p class="card-text" id="reportText"><?= $report['report_text'] ?></p>


                            <?php if (!$report['report_img_ref']) { ?>
                                <div class="d-flex justify-content-center align-items-center p-5">
                                    <img src="../img/box.png" class="img-fluid" alt="Empty img">
                                </div>
                            <?php } else { ?>
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-md-4 g-3">
                                        <?php while ($imgRows = mysqli_fetch_assoc($rs)) { ?>
                                            <div class="col-auto py-md-5">
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
                                </div>
                            <?php } ?>
                            <div class="mt-5">
                                <a href="?account" class="btn btn-outline-light login-hover">ย้อนกลับ </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>