<div class="course-curriculum-box">
    <div class="course-curriculum-title clearfix">
        <div class="title float-left">Curriculum for this course</div>
        
    </div>
    <div class="course-curriculum-accordion">

        <?php if (!empty($course->sections)): ?>

            <?php foreach ($course->sections as $key => $value): ?>

                <div class="lecture-group-wrapper">
                    
                    <div class="lecture-group-title clearfix" data-toggle="collapse"
                        data-target="#collapse<?php echo $key ?>" aria-expanded="<?php if ($key == 0): ?>true<?php else: ?>false<?php endif ?>">
                        <div class="title float-left">
                            <?php echo urldecode($value->title_section) ?> 
                        </div>
                        <div class="float-right">
                            <span class="total-lectures">
                                <!--===============================================
                                TRAER TOTAL LECCIONES
                                =================================================-->

                                <?php

                                    $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_section_lection = $value->id_section");
                                    $method = "GET";
                                    $fields = array();

                                    $getLections = CurlController::request($url,$method,$fields);

                                    if($getLections->status == 200){

                                        echo $getLections->results[0]->total." Lessons";
                                    
                                    }else{

                                        echo "0 Lessons";
                                    }

                                ?>
                            
                            </span>
                            <span class="total-time">
                                <!--===============================================
                                TRAER TOTAL DURACIÓN 
                                =================================================-->

                                <?php

                                    $url = "academy?custom=".urlencode("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration_lection))) AS total_duration FROM lections WHERE status_lection = 1 AND id_section_lection = $value->id_section");
                                    $method = "GET";
                                    $fields = array();

                                    $getLections = CurlController::request($url,$method,$fields);

                                    if($getLections->status == 200){

                                        if($getLections->results[0]->total_duration == null){

                                            echo "00:00:00 Hours";
                                        
                                        }else{

                                            echo $getLections->results[0]->total_duration." Hours";
                                        }
                                    
                                    }


                                ?> 
                            
                            </span>
                        </div>
                    </div> 

                    <div id="collapse<?php echo $key ?>" class="lecture-list collapse <?php if ($key == 0): ?>  show <?php endif ?>">
                        <ul>

                            <?php if (!empty($value->lections)): ?>

                                <?php foreach ($value->lections as $index => $item): ?>

                                    <li class="lecture <?php if (empty($item->video_lection)): ?>lecture-doc<?php endif ?> has-preview text-dark">
                                        <span class="lecture-title"><?php echo urldecode($item->title_lection) ?></span>
                                        <span class="lecture-time float-right"><?php echo urldecode($item->duration_lection) ?></span>
                                        <?php if ($item->paid_lection == 0): ?>
                                            <span class="lecture-preview float-right openVideo" src="<?php echo $item->video_lection ?>">Preview</span>
                                        <?php endif ?>
                                    </li>

                                <?php endforeach ?>

                            <?php endif ?>
                            

                        </ul>

                    </div>

                </div>


            <?php endforeach ?>

        <?php endif ?>

    </div>
</div>