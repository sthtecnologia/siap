<div class="student-feedback-box">
   
    <div class="reviews my-0">
        <div class="student-feedback-title">Student Feedback</div>
        <ul>

            <?php if (count(json_decode(urldecode($course->reviews_course),true)) > 0): ?>

                 <?php foreach (json_decode(urldecode($course->reviews_course)) as $key => $value): ?>

                    <li>
                        <div class="review-item">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="review-user-avatar">
                                        <img src="<?php echo $value->image ?>" class="rounded-circle" width="60" height="60">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="review-header">
                                        <h6 class="review-user-name mb-1"><?php echo $value->name ?></h6>
                                        <div class="review-meta mb-2">
                                            <span class="review-date text-muted"><?php echo $value->date ?></span>
                                            <span class="review-rating ms-2">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>

                                                    <?php if ($i <= $value->starts): ?>

                                                        <i class="fas fa-star text-warning"></i>
                                                        
                                                    <?php else: ?>

                                                        <i class="fas fa-star"></i>

                                                    <?php endif ?>

                                                <?php endfor ?>
                                                
                                                <span class="ms-1">(<?php echo $value->starts ?>)</span>
                                            </span>
                                        </div>
                                        <div class="review-content">
                                            <p class="text-muted mb-0"><?php echo $value->review ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </li>

                 <?php endforeach ?>

            <?php endif ?>

        
        </ul>
    </div>
</div>