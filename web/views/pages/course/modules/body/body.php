<!-- =====================================
course-content-area
 ====================================== -->

<section class="course-content-area">

    <div class="container">

        <div class="row">

            <div class="col-12 d-block d-lg-none">
                <div class="mt-3">
                     <?php include "box/box.php"; ?>
                </div>
            </div>

            <div class="col-12 col-lg-8">
        
                <?php 

                include "outcomes/outcomes.php"; 
                include "curriculum/curriculum.php"; 
                include "requirements/requirements.php";
                include "description/description.php"; 
                include "related-courses/related-courses.php"; 
                include "instructor/instructor.php";
                include "reviews/reviews.php";

                ?>
   
            </div>

            <div class="col-lg-4 d-none d-lg-block">
                <div class="course-sidebar natural" style="top: auto;">
                     <?php include "box/box.php"; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "modal/modal.php"; ?>