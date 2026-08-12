<div class="what-you-get-box mb-4">
    <div class="what-you-get-title">What will i learn?</div>
    <ul class="what-you-get__items">
         <?php if (count(json_decode(urldecode($course->outcomes_course), true))>0): ?>
        

            <?php foreach (json_decode(urldecode($course->outcomes_course)) as $key => $value): ?>
                
                <li><?php echo $value ?></li>
            <?php endforeach ?>
            
        <?php endif ?>
    </ul>
</div>