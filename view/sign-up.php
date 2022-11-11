<div class="container vh-100 pt-5">
    <div class="row py-5 px-3">
        <div class="col-12 col-md-6 d-none d-md-block p-5 bg-dark rounded">
            <img src="img/sign-in.png" class="img-fluid" alt="" srcset="">

        </div>
        <div class="col-12 col-md-6 d-block p-5 bg-primary rounded">

            <div class="d-inline p-5">
                <h1 class="text-white text-center my-3">
                    สมัครสมาชิก
                </h1>
                <form class="px-md-5" action="" method="post" id="loginForm">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border border-top-0 border-start-0 border-end-0" id="loginEmail" name="loginEmail" placeholder="กรอกอีเมลล์" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <label for="loginEmail"><i class="fa-regular fa-envelope"></i> อีเมลล์</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border border-top-0 border-start-0 border-end-0" id="loginPass" name="loginPass" placeholder="กรอกพาสเวิร์ด">
                        <label for="loginPass"><i class="fa-regular fa-lock"></i> พาสเวิร์ด</label>
                    </div>
                    <label for="#regBtn">ยังไม่มีบัญชี?</label>
                    <a href="?p=sign-in" class="link-light mb-3" id="regBtn">สมัครสมาชิกที่นี่</a>
                    <div class="d-grid gap-2 mx-auto mt-3 my-md-2">
                        <button type="submit" name="submitLogin" class="btn btn-outline-light mb-3 rounded rounded-pill">เข้าสู่ระบบ <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
                    </div>
                </form>
            </div>
            <div class="d-none d-md-block p-5">
                <a href="?p" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i> กลับ</a>
            </div>
        </div>
    </div>
</div>