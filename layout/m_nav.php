<?php if (!$_SESSION['id']) { ?>
    <ul class="nav justify-content-around align-items-center fixed-bottom bg-light shadow-lg d-sm-block d-md-none">
    <li class="nav-item">
        <a href="?p=sign-in" class="nav-link login-hover rounded-pill">เข้าสู่ระบบ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-primary active rounded-3 p-3 shadow-lg login-hover" href="?p"><i class="fa-solid fa-house text-white fs-5"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link login-hover rounded-pill disabled" data-bs-toggle="modal" data-bs-target="#chkStatusModal">ติดตามสถานะ</a>
    </li>
</ul>
<?php } else { ?>
    <ul class="nav justify-content-around align-items-center fixed-bottom bg-light shadow-lg d-sm-block d-md-none">
        <li class="nav-item">
            <a href="?p=report" class="nav-link login-hover rounded-pill">ร้องเรียน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary active rounded-3 p-3 shadow-lg login-hover" href="?p=account"><i class="fa-solid fa-house text-white fs-5"></i></a>
        </li>
        <li class="nav-item">
            <a href="php/action.php?logout" class="nav-link login-hover rounded-pill">ออกจากระบบ</a>
        </li>
    </ul>
<?php } ?>