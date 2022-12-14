<?php
session_start();
require_once 'conn.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'submitReport') {
        submitReport();
        exit;
    } elseif ($_POST['action'] == 'signIn') {
        signIn();
        exit;
    } elseif ($_POST['action'] == 'signUp') {
        signUp();
        exit;
    } elseif ($_POST['action'] == 'editReport') {
        editReport();
        exit;
    }
}

// submit report form
function submitReport()
{
    global $conn;
    date_default_timezone_set('Asia/Bangkok');

    $fname = mysqli_real_escape_string($conn, $_POST['inputFname']);
    $lname = mysqli_real_escape_string($conn, $_POST['inputLname']);
    $email = mysqli_real_escape_string($conn, $_POST['inputEmail']);
    $tel = mysqli_real_escape_string($conn, $_POST['inputTel']);
    $topic = mysqli_real_escape_string($conn, $_POST['inputTopic']);
    $text = mysqli_real_escape_string($conn, $_POST['inputText']);
    $checkbox = $_POST['checkBox'];
    $id = $_POST['id'];
    $date = date("Y-m-d H:i:s");

    $chkImg = $_FILES['image']['tmp_name'];

    $imgRef = rand('10', '100') . '_' . uniqid();

    $data = 'fname=' . $fname . '&lname=' . $lname . '&email=' . $email . '&tel=' . $tel . '&topic=' . $topic . '&text=' . $text;

    if (!$id) {
        // no ID
        if (!empty($fname)) {
            if (!empty($lname)) {
                if (!empty($email)) {
                    if (!empty($tel)) {
                        if (!empty($topic)) {
                            if (!empty($text)) {
                                if ($chkImg) {
                                    foreach ($_FILES['image']['name'] as $key => $val) {
                                        $rand = rand('1111111', '9999999');
                                        $file = $rand . '_' . $val;
                                        $imgMove = move_uploaded_file($_FILES['image']['tmp_name'][$key], '../img/upload/' . $file);
                                        if ($imgMove) {
                                            $img_q = "INSERT INTO img_tbl (report_ref, img_file, create_at) VALUES ('$imgRef', '$file', '$date')";
                                            $img_r =  mysqli_query($conn, $img_q);
                                            if ($img_r) {
                                                $query = "INSERT INTO report_tbl (report_img_ref, report_email, report_tel, report_fname, report_lname, report_topic, report_text, report_create_at, report_status) 
                            VALUES ('$imgRef', '$email', '$tel', '$fname', '$lname', '$topic', '$text', '$date', '???????????????????????????')";
                                                $result_query =  mysqli_query($conn, $query);
                                                if ($result_query) {
                                                    $_SESSION['success'] = "?????????????????????????????????????????????! ???????????????????????????????????????????????????";
                                                    header('location: ../index.php?success=?????????????????????????????????????????????! ???????????????????????????????????????????????????');
                                                } else {
                                                    $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                    header("location: ../index.php?error=??????????????????????????????????????????! ????????????????????????????????????????????????&?$data");
                                                }
                                            } else {
                                                $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                header('location: ../index.php?$data');
                                            }
                                        } else {
                                            $query = "INSERT INTO report_tbl (report_email, report_tel, report_fname, report_lname, report_topic, report_text, report_create_at, report_status) 
            VALUES ('$email', '$tel', '$fname', '$lname', '$topic', '$text', '$date', '???????????????????????????')";
                                            $result_query =  mysqli_query($conn, $query);
                                            if ($result_query) {
                                                $_SESSION['success'] = "?????????????????????????????????????????????! ???????????????????????????????????????????????????";
                                                header('location: ../index.php?success=?????????????????????????????????????????????! ???????????????????????????????????????????????????');
                                                exit;
                                            } else {
                                                $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                header("location: ../index.php?error=??????????????????????????????????????????! ????????????????????????????????????????????????&?$data");
                                                exit;
                                            }
                                        }
                                    }
                                }
                            } else {
                                $_SESSION['error'] = "????????????????????????????????????????????????????????????????????????!";
                                header("Location: ../index.php?$data");
                                exit;
                            }
                        } else {
                            $_SESSION['error'] = "?????????????????????????????????????????????!";
                            header("Location: ../index.php?$data");
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "??????????????????????????????????????????????????????????????????!";
                        header("Location: ../index.php?$data");
                        exit;
                    }
                } else {
                    $_SESSION['error'] = "????????????????????????????????????????????????!";
                    header("Location: ../index.php?$data");
                    exit;
                }
            } else {
                $_SESSION['error'] = "????????????????????????????????????????????????!";
                header("Location: ../index.php?$data");
                exit;
            }
        } else {
            $_SESSION['error'] = "???????????????????????????????????????????????????!";
            header("Location: ../index.php?$data");
            exit;
        }


        // no ID
    } else {
        if (!$checkbox) {
            $_SESSION['error'] = "????????????????????????????????????????????????????????????????????????????????????!";
            header("Location: ../index.php?$data");
            exit;
        } else {
            // has ID
            if (!empty($fname)) {
                if (!empty($lname)) {
                    if (!empty($email)) {
                        if (!empty($tel)) {
                            if (!empty($topic)) {
                                if (!empty($text)) {

                                    if ($chkImg) {
                                        foreach ($_FILES['image']['name'] as $key => $val) {
                                            $rand = rand('1111111', '9999999');
                                            $file = $rand . '_' . $val;
                                            $imgMove = move_uploaded_file($_FILES['image']['tmp_name'][$key], '../img/upload/' . $file);
                                            if ($imgMove) {
                                                $img_q = "INSERT INTO img_tbl (report_ref, img_file, create_at) VALUES ('$imgRef', '$file', '$date')";
                                                $img_r =  mysqli_query($conn, $img_q);
                                                if ($img_r) {
                                                    $query = "INSERT INTO report_tbl (report_user_ref, report_img_ref, report_email, report_tel, report_fname, report_lname, report_topic, report_text, report_create_at, report_status) 
                                                    VALUES ('$id', '$imgRef', '$email', '$tel', '$fname', '$lname', '$topic', '$text', '$date', '???????????????????????????')";
                                                    $result_query =  mysqli_query($conn, $query);
                                                    if ($result_query) {
                                                        $_SESSION['success'] = "?????????????????????????????????????????????! ???????????????????????????????????????????????????";
                                                        header('location: ../index.php?success=?????????????????????????????????????????????! ???????????????????????????????????????????????????');
                                                        exit;
                                                    } else {
                                                        $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                        header("location: ../index.php?error=??????????????????????????????????????????! ????????????????????????????????????????????????&$data");
                                                        exit;
                                                    }
                                                } else {
                                                    $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                    header('location: ../index.php?$data');
                                                }
                                            } else {
                                                $query = "INSERT INTO report_tbl (report_user_ref, report_email, report_tel, report_fname, report_lname, report_topic, report_text, report_create_at, report_status) 
                                                VALUES ('$id', '$email', '$tel', '$fname', '$lname', '$topic', '$text', '$date', '???????????????????????????')";
                                                $result_query =  mysqli_query($conn, $query);
                                                if ($result_query) {
                                                    $_SESSION['success'] = "?????????????????????????????????????????????! ???????????????????????????????????????????????????";
                                                    header('location: ../index.php?success=?????????????????????????????????????????????! ???????????????????????????????????????????????????');
                                                    exit;
                                                } else {
                                                    $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                                    header("location: ../index.php?error=??????????????????????????????????????????! ????????????????????????????????????????????????&$data");
                                                    exit;
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    $_SESSION['error'] = "????????????????????????????????????????????????????????????????????????!";
                                    header("Location: ../index.php?$data");
                                    exit;
                                }
                            } else {
                                $_SESSION['error'] = "?????????????????????????????????????????????!";
                                header("Location: ../index.php?$data");
                                exit;
                            }
                        } else {
                            $_SESSION['error'] = "??????????????????????????????????????????????????????????????????!";
                            header("Location: ../index.php?$data");
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "????????????????????????????????????????????????!";
                        header("Location: ../index.php?$data");
                        exit;
                    }
                } else {
                    $_SESSION['error'] = "????????????????????????????????????????????????!";
                    header("Location: ../index.php?$data");
                    exit;
                }
            } else {
                $_SESSION['error'] = "???????????????????????????????????????????????????!";
                header("Location: ../index.php?$data");
                exit;
            }
            // has ID
        }
    }
    exit;
}

// Register
function signUp()
{
    global $conn;

    $fname = mysqli_real_escape_string($conn, $_POST['signupFname']);
    $lname = mysqli_real_escape_string($conn, $_POST['signupLname']);
    $email = mysqli_real_escape_string($conn, $_POST['signupEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['signupPass']);
    $tel = mysqli_real_escape_string($conn, $_POST['signupTel']);
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d H:i:s");

    $data = 'fname=' . $fname . '&lname=' . $lname . '&email=' . $email . '&tel=' . $tel . '&pass=' . $password;


    if (!empty($fname)) {
        if (!empty($lname)) {
            if (!empty($email)) {
                if (!empty($tel)) {
                    if (!empty($password)) {
                        // check duplicate data
                        $user_check_query = "SELECT * FROM user_tbl WHERE u_email = '$email'";
                        $query = mysqli_query($conn, $user_check_query);
                        $check = mysqli_fetch_assoc($query);

                        if ($check['u_email'] == $email || $check['u_tel'] == $tel) {
                            $_SESSION['error'] = "?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????!";
                            header("Location: ../index.php?p=sign-up&?$data");
                            exit;
                        } else {
                            $query = "INSERT INTO user_tbl (u_email, u_pwd, u_fname, u_lname, u_tel, u_reg)
                    VALUES ('$email', '$password', '$fname', '$lname', '$tel', '$date')";
                            $result_query =  mysqli_query($conn, $query);
                            if ($result_query) {
                                $_SESSION['success'] = "???????????????????????????????????????????????????!";
                                header("Location: ../index.php?p=sign-in");
                                exit;
                            } else {
                                $_SESSION['error'] = "??????????????????????????????????????????! ????????????????????????????????????????????????";
                                header("Location: ../index.php?p=sign-up&$data");
                                exit;
                            }
                        }
                    } else {
                        $_SESSION['error'] = "??????????????????????????????????????????????????????";
                        header("Location: ../index.php?p=sign-up&$data");
                        exit;
                    }
                } else {
                    $_SESSION['error'] = "??????????????????????????????????????????????????????????????????";
                    header("Location: ../index.php?p=sign-up&$data");
                    exit;
                }
            } else {
                $_SESSION['error'] = "????????????????????????????????????????????????";
                header("Location: ../index.php?p=sign-up&$data");
                exit;
            }
        } else {
            $_SESSION['error'] = "????????????????????????????????????????????????";
            header("Location: ../index.php?p=sign-up&$data");
            exit;
        }
    } else {
        $_SESSION['error'] = "???????????????????????????????????????????????????";
        header("Location: ../index.php?p=sign-up&$data");
        exit;
    }
}

// Log in
function signIn()
{
    global $conn;

    $email = mysqli_real_escape_string($conn, $_POST['signinEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['signinPass']);

    $data = 'email=' . $email;

    if (!$email) {
        $_SESSION['error'] = "???????????????????????????????????????????????? !";
        header("Location: ../index.php?p=sign-in&$data");
        exit;
    } else {
        if (!$password) {
            $_SESSION['error'] = "??????????????????????????????????????????????????????!";
            header("Location: ../index.php?p=sign-in&$data");
            exit;
        } else {
            $user = "SELECT * FROM user_tbl WHERE u_email = '$email' AND u_pwd = '$password'";
            $query = mysqli_query($conn, $user);
            $result = mysqli_fetch_assoc($query);

            if ($result > 0) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['role'] = $result['u_role'];
                $_SESSION['success'] = "???????????????????????????????????????????????????!";
                header('location: ../index.php?p=account');
                exit;
            } else {
                $_SESSION['error'] = "??????????????????????????????????????????????????????????????????????????????????????????";
                header('location: ../index.php?p=sign-in');
                exit;
            }
        }
    }
}

// Log out
if (isset($_GET['logout'])) {
    $_SESSION['success'] = "????????????????????????????????????????????????!";
    header("Location: ../index.php");
    session_unset();
    session_destroy();
    exit;
}

// count Users
function countUsers($conn)
{
    global $conn;

    $countQuery = "SELECT COUNT(id) AS cID FROM user_tbl";
    $countResult = mysqli_query($conn, $countQuery);
    $countUser = mysqli_fetch_assoc($countResult);
    return $countUser;
}

// count Check status
function countCheckStatus($conn)
{
    global $conn;

    $countQuery = "SELECT COUNT(id) AS cID FROM report_tbl WHERE report_status = '???????????????????????????'";
    $countResult = mysqli_query($conn, $countQuery);
    $countUser = mysqli_fetch_assoc($countResult);
    return $countUser;
}

// count Checked status
function countCheckedStatus($conn)
{
    global $conn;

    $countQuery = "SELECT COUNT(id) AS cID FROM report_tbl WHERE report_status = '???????????????????????????????????????'";
    $countResult = mysqli_query($conn, $countQuery);
    $countUser = mysqli_fetch_assoc($countResult);
    return $countUser;
}

// Y-m-d to Thai date
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "???.???.", "???.???.", "??????.???.", "??????.???.", "???.???.", "??????.???.", "???.???.", "???.???.", "???.???.", "???.???.", "???.???.", "???.???.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

// update report status
function editReport()
{
    global $conn;
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d H:i:s");
    $id = $_POST['id'];
    $status = $_POST['selectStatus'];

    $updateQuery = "UPDATE report_tbl SET report_status='$status', report_update_at='$date' WHERE id='$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $_SESSION['success'] = "??????????????????????????????????????????????????????!";
        header("Location: ../index.php?p=account");
        exit;
    }
}
