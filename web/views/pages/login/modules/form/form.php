 <!-- =====================================
Login Form
====================================== -->

<section class="category-course-list-area mt-4 pt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="user-dashboard-box mt-3">

                    <div class="user-dashboard-content w-100 login-form">
                        <div class="content-title-box">
                            <div class="title">Login</div>
                            <div class="subtitle">Provide your valid login credentials.</div>
                        </div>

                        <form method="post">

                            <div class="content-box">
                                <div class="basic-group">

                                    <div class="form-group">

                                        <label for="login-email">
                                            <span class="input-field-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span> Email:
                                        </label>

                                        <input type="email" class="form-control" name="login_email" id="login-email" placeholder="Email" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="login-password">
                                            <span class="input-field-icon">
                                                <i class="fas fa-lock"></i>
                                            </span> Password:
                                        </label>

                                        <input type="password" class="form-control" name="login_password" placeholder="Password">

                                    </div>

                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn" onclick="alertClick('Ingresando al sistema...')">Login</button>
                            </div>

                            <?php 
                                require_once "controllers/student.controller.php";
                                $student = new StudentController();
                                $student -> login();
                            ?>

                            <div class="forgot-pass text-center">
                                <span>Or</span>
                                <a href="#" onclick="toggoleForm('forgot-password-form','login-form')">Forgot password</a>
                            </div>
                            <div class="account-have text-center">
                                Do not have an account? <a href="/register">Sign up</a>
                            </div>
                        </form>
                    </div>

                    <div class="user-dashboard-content w-100 forgot-password-form" style="display:none">
                        <div class="content-title-box">
                            <div class="title">Forgot password</div>
                            <div class="subtitle">Provide your email address to get password.</div>
                        </div>
                        <form action="" method="post">
                            <div class="content-box">
                                <div class="basic-group">

                                    <div class="form-group">

                                        <label for="forgot-email">
                                            <span class="input-field-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span> Email:
                                        </label>

                                        <input type="email" class="form-control" name="forgot_email" id="forgot-email" placeholder="Email" required>

                                        <small class="form-text text-muted">Provide your email address to get password.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Reset password</button>
                            </div>

                            <?php 
                                require_once "controllers/student.controller.php";
                                $student = new StudentController();
                                $student -> forgotPass();
                            ?>

                            <div class="forgot-pass text-center">
                                Want to go back?  <a href="#" onclick="toggoleForm('login-form','forgot-password-form')">Login</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
