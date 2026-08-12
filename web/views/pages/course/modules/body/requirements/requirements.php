<div class="requirements-box">
    <div class="requirements-title">Requirements</div>
    <div class="requirements-content">
        <ul class="requirements__list">
           <?php if (!empty(urldecode($course->requirements_course))): ?>

            <?php foreach (explode(",",urldecode($course->requirements_course)) as $key => $value): ?>
                
                <li><?php echo $value ?></li>
            
            <?php endforeach ?>
            
        <?php endif ?>
        </ul>
    </div>
</div>