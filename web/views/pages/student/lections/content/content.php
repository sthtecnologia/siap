<div class="course-content-sidebar">
                    
    <!-- Header -->
    <div class="sidebar-header p-3 border-bottom bg-white">
        <h5 class="mb-2 text-center">Course content</h5>

        <div class="progress mb-2" style="height: 8px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo ceil(count($lecturesProperty)*100/$totalLections) ?>%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

    </div>

    <!-- Lessons List -->
    <div class="lessons-list">

        <?php if (!empty($course)): ?>

            <?php foreach ($course->sections as $key => $value): ?>

                <!-- Section 1 -->
                <div class="lesson-section">
                    <div class="section-header p-3 border-bottom bg-white" data-toggle="collapse" data-target="#section<?php echo ($key+1) ?>">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 font-weight-bold"><?php echo urldecode($value->title_section) ?></h6>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div id="section<?php echo ($key+1) ?>" class="collapse <?php if ($key == 0): ?> show<?php endif ?>">

                        <?php foreach ($value->lections as $index => $item): ?>

                        <div class="lesson-item p-3 border-bottom d-flex justify-content-between align-items-center thisLection <?php if ($key == 0 && $index == 0): ?>bg-academy<?php endif ?>" style="cursor:pointer" video="<?php echo $item->video_lection ?>" html="<?php echo base64_encode(urldecode($item->html_lection)) ?>">
                            <div class="d-flex align-items-center">

                                <div class="custom-control custom-checkbox mr-2">
                                    <input type="checkbox" class="custom-control-input checkLection" id="customCheck<?php echo $key ?>_<?php echo $index ?>" name="customCheck<?php echo $key ?>_<?php echo $index ?>" value="<?php echo $course->id_course."_".$item->id_lection ?>" <?php if (in_array($item->id_lection, $lecturesProperty)): ?> checked <?php endif ?>>
                                    <label class="custom-control-label" for="customCheck<?php echo $key ?>_<?php echo $index ?>"></label>
                                </div>
                                
                                <?php if (!empty($item->video_lection)): ?>

                                    <i class="far fa-play-circle mr-2 <?php if ($key == 0 && $index == 0): ?>text-white <?php else: ?> text-muted <?php endif ?>"></i>

                                <?php else: ?>

                                    <i class="fas fa-file-alt mr-2 <?php if ($key == 0 && $index == 0): ?>text-white <?php else: ?> text-muted <?php endif ?>"></i>

                                 <?php endif ?>


                                <div>
                                    <div class="lesson-title">
                                       <?php echo urldecode($item->title_lection) ?> 
                                    </div>
                                    <small class="<?php if ($key == 0 && $index == 0): ?>text-white <?php else: ?> text-muted <?php endif ?>"><?php echo TemplateController::formatDate(0, urldecode($item->duration_lection)) ?></small>

                                    <?php if (!empty($item->attachment)): ?>

                                        <div class="dropdown">
                                            <button type="button" class="bg-white border-0 border-bottom  border-top dropdown-toggle rounded" data-toggle="dropdown" style="font-size:12px !important">
                                                Material de Apoyo
                                            </button>
                                            <div class="dropdown-menu">

                                                <?php foreach ($item->attachment as $num => $elem): ?>

                                                    <a class="dropdown-item" href="<?php  echo !empty($elem->file_attachment) ? urldecode($elem->file_attachment) : urldecode($elem->link_attachment)  ?>" target="_blank" style="font-size:12px !important">
                                                        <i class="fas fa-external-link-alt"></i> 
                                                        <?php echo urldecode($elem->title_attachment) ?>
                                                    </a>
                                                    
                                                <?php endforeach ?>
                                               
                                            </div>
                                        </div>


                                    <?php endif ?>

                                </div>

                            </div>
                            <span class="<?php if ($key == 0 && $index == 0): ?>text-white <?php else: ?> text-muted <?php endif ?> small"><?php echo urldecode($item->duration_lection) ?></span>
                        </div>

                        <?php endforeach ?>

                    </div>
             
                </div>

            <?php endforeach ?>

        <?php endif ?> 

    </div>

</div>