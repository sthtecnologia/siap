<ul class="nav nav-tabs border-bottom" id="lessonTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab">
            <i class="fas fa-info-circle mr-2"></i> Overview
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa" role="tab">
            <i class="fas fa-question-circle mr-2"></i> Q&A
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="certificate-tab" data-toggle="tab" href="#certificate" role="tab">
            <i class="fas fa-certificate mr-2"></i> Certificate
        </a>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content p-4" id="lessonTabContent">
    
    <!-- Overview Tab -->
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
        <h5 class="mb-3">Course Overview</h5>
        <p>Welcome to this comprehensive Bootstrap 4 course! In this lesson, you'll learn the fundamentals of building responsive websites.</p>
    </div>

    <!-- Q&A Tab -->
    <div class="tab-pane fade" id="qa" role="tabpanel">
        <div class="qa-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Questions in this course</h5>
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i> Ask question
                </button>
            </div>

            <!-- Search Box -->
            <div class="search-questions mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search in questions...">
                    <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button></div>
            </div>

            <!-- Questions List -->
            <div class="questions-list">
                
                <!-- Question 1 -->
                <div class="question-item border-bottom pb-3 mb-3">
                    <div class="d-flex">
                        
                        <div class="question-content flex-grow-1">
                            <h6 class="mb-2">
                                <a href="#" class="text-dark">Can't editor extension</a>
                            </h6>
                            <p class="text-muted small mb-2">I am having issues downloading extension. Let me know can I add it database</p>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/100" alt="User" class="rounded-circle mr-2" style="width: 24px; height: 24px;">
                                <small class="text-muted">Mathew Thompson, Jul 24 Aug 2020</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question-item border-bottom pb-3 mb-3">
                    <div class="d-flex">
                       
                        <div class="question-content flex-grow-1">
                            <h6 class="mb-2">
                                <a href="#" class="text-dark">[Bootstrap doesn't save all my code in all browsers]</a>
                            </h6>
                            <p class="text-muted small mb-2">Hi Jon, when creating a new file it works in a bunch of browsers but in the meanwhile, data isn't save to the database when in a...</p>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/100" alt="User" class="rounded-circle mr-2" style="width: 24px; height: 24px;">
                                <small class="text-muted">Ahmed Freeman, Jul 24 Aug 2020</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question-item border-bottom pb-3 mb-3">
                    <div class="d-flex">
                       
                        <div class="question-content flex-grow-1">
                            <h6 class="mb-2">
                                <a href="#" class="text-dark">[script] not working in Heroku but everything is loading</a>
                            </h6>
                            <p class="text-muted small mb-2">Can't you tell me what is wrong? I can't see what is the issue what's in the meanwhile when I'm change font</p>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/100" alt="User" class="rounded-circle mr-2" style="width: 24px; height: 24px;">
                                <small class="text-muted">Signe Thompson, Jul 11 Aug 2020</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Certificate Tab -->
    <div class="tab-pane fade" id="certificate" role="tabpanel">
        <h5 class="mb-3">Certificate</h5>
        <p>Complete the course to earn your certificate.</p>
    </div>

</div>