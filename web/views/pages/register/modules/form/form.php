 <!-- =====================================
Register Form
====================================== -->

<section class="category-course-list-area mt-4 pt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">

                  <div class="user-dashboard-content w-100 register-form">
                      <div class="content-title-box">
                          <div class="title">Registration form</div>
                          <div class="subtitle">Sign up and start learning.</div>
                      </div>
                      <form method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  
                                  <div class="form-group">

                                      <label for="first_name">
                                        <span class="input-field-icon">
                                          <i class="fas fa-user"></i>
                                        </span> First name:
                                      </label>

                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" required>

                                  </div>

                                  <div class="form-group">

                                      <label for="last_name">
                                        <span class="input-field-icon">
                                          <i class="fas fa-user"></i>
                                        </span> Last name:
                                      </label>

                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" required>
                                  
                                  </div>

                                  <div class="form-group">

                                      <label for="registration-email">
                                        <span class="input-field-icon">
                                          <i class="fas fa-envelope"></i>
                                        </span> Email:
                                      </label>

                                      <input type="email" class="form-control" name="email" id="registration-email" placeholder="Email" required>
                                  
                                  </div>

                                  <div class="form-group">
                                      <label for="registration-password">
                                        <span class="input-field-icon">
                                          <i class="fas fa-lock"></i>
                                        </span> Password:
                                      </label>

                                      <input type="password" class="form-control" name="password" id="registration-password" placeholder="Password" required>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn" onclick="alertClick('Registrando los datos...')">Sign up</button>
                          </div>
                          <div class="account-have text-center">
                              Already have an account? <a href="/login">Login</a>
                          </div>

                          <?php 
                            require_once "controllers/student.controller.php";
                            $student = new StudentController();
                            $student -> register();
                          ?>
                      </form>
                  </div>

                 
              </div>
            </div>
        </div>
    </div>
</section>