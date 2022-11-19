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
            if ($p) {
                switch ($p) {
                    case "sign-in":
                        require_once 'view/sign-in.php';
                        break;
                    case "sign-up":
                        require_once 'view/sign-up.php';
                        break;
                    default:
                        require_once 'view/index.php';
                }
            } else {
                require_once 'view/index.php';
            }
        } else {
            require_once 'view/index.php';
        }
    } else {
        if ($_SESSION['role'] == 'Member') {
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                if ($p) {
                    switch ($p) {
                        case "report":
                            require_once 'view/index.php';
                            break;
                        case "status":
                            require_once 'view/status.php';
                            break;
                        default:
                            require_once 'view/account.php';
                    }
                } else {
                    require_once 'view/account.php';

                }
            } elseif (isset($_GET['status'])) {
                require_once 'view/status.php';
            } else {
                require_once 'view/account.php';
            }
        } elseif ($_SESSION['role'] == 'Admin') {
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                if ($p) {
                    switch ($p) {
                        case "report":
                            require_once 'view/index.php';
                            break;
                        default:
                            require_once 'view/admin.php';
                    }
                } else {
                    require_once 'view/admin.php';

                }
            } elseif (isset($_GET['view'])) {
                require_once 'view/editReport.php';
            } else {
                require_once 'view/admin.php';
            }
        }
    } ?>

    <!-- Data table -->
    <script>
        $(document).ready(function() {
            $('#reportTable').DataTable();

            var table = $('#reportTable').DataTable();

            // #myInput is a <input type="text"> element
            $('#myInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <!-- Data table -->

    <?php
    include 'php/alert.php';
    include "layout/footer.php";
    ?>