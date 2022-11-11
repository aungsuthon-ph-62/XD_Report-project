<section class="gradient-custom">
    <div class="container h-100">
        <div class="d-flex justify-content-center py-5 h-100">
            <div class="card bg-dark text-white p-5" style="border-radius: 1rem;">
                <div class="card-body text-center">

                    <div class="mb-md-3 mt-md-4 ppy-5">

                        <h2 class="fw-bold mb-5 text-uppercase">สมัครสมาชิก</h2>

                        <form action="php/action.php" method="post">
                            <input type="hidden" name="action" value="signUp">
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="signupEmail" name="signupEmail" class="form-control form-control-lg" value="<?php if (isset($_GET['email'])) {
                                                                                                                                        echo $_GET['email'];
                                                                                                                                    }?>">
                                <label class="form-label" for="signupEmail">อีเมลล์</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="signupPass" name="signupPass" class="form-control form-control-lg" value="<?php if (isset($_GET['pass'])) {
                                                                                                                                        echo $_GET['pass'];
                                                                                                                                    }?>">
                                <label class="form-label" for="signupPass">พาสเวิร์ด</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="signupFname" name="signupFname" class="form-control form-control-lg" value="<?php if (isset($_GET['fname'])) {
                                                                                                                                        echo $_GET['fname'];
                                                                                                                                    }?>">
                                <label class="form-label" for="signupFname">ชื่อจริง</label>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="signupLname" name="signupLname" class="form-control form-control-lg" value="<?php if (isset($_GET['lname'])) {
                                                                                                                                        echo $_GET['lname'];
                                                                                                                                    }?>">
                                <label class="form-label" for="signupLname">นามสกุล</label>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="signupTel" name="signupTel" class="form-control form-control-lg" value="<?php if (isset($_GET['fname'])) {
                                                                                                                                        echo $_GET['fname'];
                                                                                                                                    }?>">
                                <label class="form-label" for="signupTel">เบอร์โทรศัพท์</label>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5 login-hover" type="submit">Register</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>