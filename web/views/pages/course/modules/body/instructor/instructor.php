<div class="about-instructor-box">
    <div class="about-instructor-title">
        About the instructor
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="about-instructor-image">
                <img src="/views/assets/img/instructor1.jpg" alt=""
                    class="img-fluid">
                <ul>
                    <!-- <li><i class="fas fa-star"></i><b>4.4</b> Average Rating</li> -->
                    <li><i class="fas fa-comment"></i><b>
                            0</b> Reviews</li>
                    <li><i class="fas fa-user"></i><b>
                            0</b> Students</li>
                    <li><i class="fas fa-play-circle"></i><b>
                            1</b> Courses</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="about-instructor-details view-more-parent expanded has-hide">
                <div class="instructor-name">
                    <?php echo urldecode($course->name_instructor) ?>
                </div>
                <div class="instructor-bio">
                    <?php echo urldecode($course->description_instructor) ?>
                </div>
            </div>
        </div>
    </div>
</div>