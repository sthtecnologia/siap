<!-- =====================================
Menú
====================================== -->

<section class="menu-area">

    <div class="container-xl">

        <div class="row">

            <div class="col">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <!-- =====================================
                    Menú Mobile
                    ====================================== -->

                    <ul class="mobile-header-buttons">
                        <li>
                            <a class="mobile-nav-trigger" href="#">
                                Menu
                                <span></span>
                            </a>
                        </li>
                        <li>
                            <a class="mobile-search-trigger" href="#">
                                Search
                                <span></span>
                            </a>
                        </li>
                    </ul>

                    <a href="/" class="navbar-brand">
                        <img src="/views/assets/img/logo-dark.png" height="35">
                    </a>

                    <!-- =====================================
                    Botonera
                    ====================================== -->

                    <?php

                    include "buttons/buttons.php";

                    ?>

                    <!-- =====================================
                    Buscador
                    ====================================== -->

                    <form class="inline-form" style="width: 100%;" action="/courses">
                        <div class="input-group search-box mobile-search">
                            <input
                                type="text"
                                name="query"
                                class="form-control"
                                placeholder="Search for courses"
                            >
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- =====================================
                    Shopping Cart
                    ====================================== -->

                   <?php

                    include "shopping-cart/shopping-cart.php";

                    ?>

                    <span class="signin-box-move-desktop-helper"></span>

                    <!-- =====================================
                    Login and Register
                    ====================================== -->

                    <?php if (!isset($_SESSION["student"])): ?>
                   

                        <div class="sign-in-box btn-group">

                            <a href="/login" class="btn btn-sign-in">
                                Log in
                            </a>

                            <a href="/register" class="btn btn-sign-up">
                                Sign up
                            </a>

                        </div>

                    <?php else: ?>

                        <!-- =====================================
                        My Courses
                        ====================================== -->

                        <div class="instructor-box menu-icon-box">
                            <div class="icon">
                                <a href="/student" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">My courses</a>
                            </div>
                        </div>

                        <div class="user-profile-box">
                            <ul class="list-unstyled topbar-right-menu float-end mb-0">
                                <li class="dropdown notification-list">
                                    <a class="me-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="account-user-avatar">
                                             <?php if (empty($_SESSION["student"]->picture_student)):?>
                                            <img src="https://placehold.co/100" alt="juan urrego" class="rounded-circle" style="width: 40px; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                            <?php else: ?>
                                                <img src="<?php echo $_SESSION["student"]->picture_student ?>" class="rounded-circle" style="width: 40px; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                            <?php endif ?>

                                        </span>
                                        
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                        <div class="dropdown-header noti-title">
                                            <h6 class="text-overflow m-0"><?php echo $_SESSION["student"]->name_student ?></h6>
                                        </div>
                                        <a href="/student/account" class="dropdown-item notify-item">
                                            <i class="fas fa-user-circle me-2"></i>
                                            <span>My account</span>
                                        </a>
                                        <a href="/logout" class="dropdown-item notify-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    <?php endif ?>

                </nav>

            </div>

        </div>

    </div>

</section>