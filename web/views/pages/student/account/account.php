<!-- =====================================
header-area
====================================== -->

<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                My Account
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                 My Account
                </h1>
            </div>
        </div>
    </div>
</section>

 <!-- =====================================
My Account
====================================== -->

<section class="category-course-list-area mt-4 pt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="user-dashboard-box mt-3">
                    <div class="user-dashboard-content w-100">
                          
                        <!-- Profile Photo Section -->
                        <div class="profile-photo-section p-4 mb-4 bg-white rounded">

                            <form method="post" enctype="multipart/form-data">

                                <input type="hidden" value="<?php echo $_SESSION["student"]->id_student ?>" name="update_id">
                            
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="d-flex align-items-center">
                                        <div class="profile-photo-large me-4">
                                            <?php if (empty($_SESSION["student"]->picture_student)):?>
                                            <img src="https://placehold.co/100" class="rounded-circle" style="width: 100px; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                            <?php else: ?>
                                            <img src="<?php echo $_SESSION["student"]->picture_student ?>" class="rounded-circle" style="width: 100px; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                            <?php endif ?>
                                            <input type="hidden" name="old_picture_student" value="<?php echo $_SESSION["student"]->picture_student ?>">
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Profile photo</h5>
                                            <p class="text-muted mb-0">Update your profile photo and personal details</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-dark rounded" onclick="$('#profile_photo').click()">
                                            <i class="fas fa-upload me-2"></i> Upload photo
                                        </button>
                                    </div>
                                </div>

                                <input 
                                type="file"
                                name="profile_photo" 
                                id="profile_photo" 
                                accept="image/*"
                                style="display:none;" 
                                >

                                <!-- Profile Info Section -->
                                <div class="content-title-box">
                                    <div class="title">Profile info</div>
                                </div>
        
                          
                                <div class="p-4">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first_name">Full name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-light border-right-0">
                                                            <i class="fas fa-user text-muted"></i>
                                                        </span>
                                                    </div>
                                                
                                                    <input type="text" class="form-control border-left-0" id="first_name" name="update_name" value="<?php echo $_SESSION["student"]->name_student ?>" placeholder="Full name">
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-light border-right-0">
                                                            <i class="fas fa-envelope text-muted"></i>
                                                        </span>
                                                    </div>
                                                
                                                    <input type="email" class="form-control border-left-0" id="email" name="update_email" value="<?php echo $_SESSION["student"]->email_student ?>" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-light border-right-0">
                                                            <i class="fas fa-phone text-muted"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control border-left-0" id="password" name="update_password"  placeholder="******">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
     
                                <div class="content-update-box mt-4">
                                    <button type="submit" class="btn btn-primary rounded" onclick="alertClick('Guardando cambios...')">
                                        <i class="fas fa-save me-2"></i> Save changes
                                    </button>
                                </div>

                                <?php

                                    require_once "controllers/student.controller.php";
                                    $profile = new StudentController();
                                    $profile -> updateProfile();

                                ?>

                            </form>
                         
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>