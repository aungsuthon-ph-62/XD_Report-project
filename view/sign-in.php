<section class="vh-100 gradient-custom">
  <div class="container py-md-5 h-100">
    <div class="d-flex justify-content-center py-5 h-100">
      <div class="card bg-dark text-white p-5" style="border-radius: 1rem;">
        <div class="card-body text-center">

          <div class="mb-md-3 mt-md-4 pb-5">

            <h2 class="fw-bold mb-5 text-uppercase">เข้าสู่ระบบ</h2>

            <form action="php/action.php" method="post">
              <input type="hidden" name="action" value="signIn">
              <div class="form-outline form-white mb-4">
                <input type="email" id="signinEmail" name="signinEmail" class="form-control form-control-lg" />
                <label class="form-label" for="signinEmail">อีเมลล์</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="signinPass" name="signinPass" class="form-control form-control-lg" />
                <label class="form-label" for="signinPass">พาสเวิร์ด</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5 login-hover" type="submit">Login</button>
            </form>

            <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">ลืมรหัสผ่าน?</a></p>


            <!-- <div class="d-flex justify-content-center text-center mt-5">
              <div class="px-3">
                <a href="#!" class="text-white btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f fa-lg"></i></a>
              </div>
              <div class="px-3">

                <a href="#!" class="text-white btn btn-outline-light rounded-circle"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
              </div>
              <div class="px-3">
                <a href="#!" class="text-white btn btn-outline-light rounded-circle"><i class="fab fa-google fa-lg"></i></a>

              </div>
            </div> -->

          </div>

          <div class="px-3 px-md-0">
            <p class="mb-0">ยังไม่มีบีญชี? <a href="#!" class="text-danger fw-bold">สมัครสมาชิกที่นี่</a>
            </p>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>