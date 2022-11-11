<?php
session_start();
include "layout/head.php";
include 'view/modal.php';
include 'layout/m_nav.php';



?>
<style>
    body {
        font-family: "Kanit", sans-serif;
        font-family: "Noto Sans", sans-serif;
        font-family: "Noto Sans Thai", sans-serif;
        font-family: "Poppins", sans-serif;
        font-family: "Prompt", sans-serif;
        /* fallback for old browsers */
        background: #3f3b6c;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right,
                rgb(63, 59, 108),
                rgb(98, 79, 130));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgb(63, 59, 108), rgb(98, 79, 130));
    }
</style>

<body>

    <?php if (!$_SESSION['id']) {
        if (isset($_GET['p'])) {
            $p = $_GET['p'];
            switch ($p) {
                case "sign-in":
                    include 'view/sign-in.php';
                    break;
                case "sign-up":
                    include 'view/sign-up.php';
                    break;
                case "account":
                    if (isset($_SESSION['id'])) {
                        if (!$_SESSION['id']) {
                            $_SESSION['error'] = "กรุณาเข้าสู่ระบบก่อน!";
                            header("Location: ../index.php?p=sign-in");
                            exit;
                        } else {
                            include 'view/account.php';
                        }
                    }
                default:
                    include 'view/index.php';
            }
        } else {
            include 'view/index.php';
        }
    } elseif (isset($_GET['report'])) {
        include 'view/index.php';
    } else {
        include 'view/account.php';
    } ?>
    <?php
    include 'php/alert.php';
    include "layout/footer.php";
    ?>