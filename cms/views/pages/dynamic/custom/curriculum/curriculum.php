<!--==============================
Custom
 ================================-->

<div class=" col-lg-12  col-12 mb-3 position-relative">

	<div class="d-lg-flex justify-content-lg-between mt-2">

		<div class="text-capitalize h5 ps-2">curriculum Crea API's con PHP y MySQL</div>

		<div class="pe-0">
			<ul class="nav justify-content-lg-end">
				<li class="nav-item">
					<a class="nav-link py-0 px-0 text-dark" href="/cursos">Cursos</a>
				</li>
				<li class="nav-item ps-3">/</li>
				<li class="nav-item">
					<a class="nav-link py-0 disabled text-capitalize" href="#">Regresar</a>
				</li> 
			</ul>
		</div>

	</div>

</div>

<div class="col-12 mb-3 position-relative">

  <!--==============================
   Start Custom
  ================================-->

  <div class="card rounded">
  	
  	<div class="card-body">
  		<!-- Action Buttons -->
  		<div class="mb-4 text-center">
  			<button type="button" class="btn btn-outline-primary btn-sm me-2">
  				<i class="bi bi-plus-circle me-1"></i> Add section
  			</button>
  			<button type="button" class="btn btn-outline-primary btn-sm me-2">
  				<i class="bi bi-plus-circle me-1"></i> Add lesson
  			</button>
  			<button type="button" class="btn btn-outline-primary btn-sm me-2">
  				<i class="bi bi-plus-circle me-1"></i> Add Attachment
  			</button>
  			<button type="button" class="btn btn-outline-primary btn-sm">
  				<i class="bi bi-arrow-down-up me-1"></i> Sort sections
  			</button>
  		</div>

  		<div class="accordion" id="curriculumAccordion">
  			
  			<!-- Section 1: Getting Started With This Course -->
  			<div class="accordion-item my-3 border-top">
  				<h2 class="accordion-header d-flex align-items-center">
  					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#section1" aria-expanded="true" aria-controls="section1">
  						<strong>Section 1: Getting Started With This Course</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
  					</button>
  					
  				</h2>
  				<div id="section1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 1: What Is WordPress?</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 2: Code The Basic Webpage Layout</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 3: Setting Up Your Project Environment</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 4: Universal Lesson</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 5: HTML 5</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 6: Welcome To The Course! You Made The Right Decision</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 7: What Is Bootstrap? And Why Mastering It Will Save You Hundreds Of Hours</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
  								<div class="d-flex align-items-center">
  									<i class="bi bi-play-circle me-2"></i>
  									<span>Lesson 8: What Is WordPress? And Why You Should Care So Much About It</span>
  								</div>
  								<div class="d-flex gap-2">
  									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
  										<i class="bi bi-pencil"></i>
  									</button>
  									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
  										<i class="bi bi-x-circle"></i>
  									</button>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Section 2: Brand Section -->
  			<div class="accordion-item my-3 border-top">
  				<h2 class="accordion-header d-flex align-items-center">
  					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section2" aria-expanded="false" aria-controls="section2">
  						<strong>Section 2: Brand Section</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
  					</button>
  					
  				</h2>
  				<div id="section2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 9: Google Doc</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-file-earmark-pdf me-2"></i>
									<span>Lesson 10: Google PDF</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-file-earmark-slides me-2"></i>
									<span>Lesson 11: Google Slides</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-file-earmark-spreadsheet me-2"></i>
									<span>Lesson 12: Google Sheet</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-geo-alt me-2"></i>
									<span>Lesson 13: Google Map</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Section 3: Environment Setup: Get Your Project Started -->
			<div class="accordion-item my-3 border-top">
				<h2 class="accordion-header d-flex align-items-center">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section3" aria-expanded="false" aria-controls="section3">
						<strong>Section 3: Environment Setup: Get Your Project Started</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
					</button>
					
				</h2>
  				<div id="section3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 14: Free Download: The Bootstrap Framework</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-file-earmark-text me-2"></i>
									<span>Unit 1: Bootstrap Pop Quiz</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-question-circle me-2"></i>
									<span>Quiz 2: WordPress Pop Quiz</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Section 4: Bootstrap Templates: Your Home Page -->
			<div class="accordion-item my-3 border-top">
				<h2 class="accordion-header d-flex align-items-center">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section4" aria-expanded="false" aria-controls="section4">
						<strong>Section 4: Bootstrap Templates: Your Home Page</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
					</button>
					
				</h2>
  				<div id="section4" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-file-earmark-slides me-2"></i>
									<span>Lesson 15: Install First Icon Fonts with FontAwesome</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 16: Learn How to Create a Modal Popup using Bootstrap</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Section 5: WordPress Theme: Setup -->
			<div class="accordion-item my-3 border-top">
				<h2 class="accordion-header d-flex align-items-center">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section5" aria-expanded="false" aria-controls="section5">
						<strong>Section 5: WordPress Theme: Setup</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
					</button>
					
				</h2>
  				<div id="section5" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 17: Download the Latest Version of WordPress</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 18: Install WordPress on Your Local Machine in Under 5 Minutes</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Section 6: The Final Details -->
			<div class="accordion-item my-3 border-top">
				<h2 class="accordion-header d-flex align-items-center">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section6" aria-expanded="false" aria-controls="section6">
						<strong>Section 6: The Final Details</strong>
						<div class="flex-grow-1 d-flex justify-content-end me-3">
							<span class="btn btn-sm btn-outline-secondary me-2" title="Sort lesson">
								<i class="bi bi-arrow-down-up"></i> Sort lesson
							</span>
							<span class="btn btn-sm btn-outline-secondary me-2" title="Edit section">
								<i class="bi bi-pencil"></i> Edit section
							</span>
							<span class="btn btn-sm btn-outline-secondary" title="Delete section">
								<i class="bi bi-x-circle"></i> Delete section
							</span>
						</div>
					</button>
					
				</h2>
  				<div id="section6" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
  					<div class="accordion-body">
  						<div class="list-group list-group-flush">
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 19: Track Your Visitors With Google Analytics</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-play-circle me-2"></i>
									<span>Lesson 20: You've Created Your Own Custom WordPress Theme! Now What?</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
							<div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between my-1 bg-light">
								<div class="d-flex align-items-center">
									<i class="bi bi-question-circle me-2"></i>
									<span>Quiz 3: Information Architecture Pop Quiz</span>
								</div>
								<div class="d-flex gap-2">
									<button type="button" class="btn btn-sm btn-link text-secondary p-0" title="Edit lesson">
										<i class="bi bi-pencil"></i>
									</button>
									<button type="button" class="btn btn-sm btn-link text-danger p-0" title="Delete lesson">
										<i class="bi bi-x-circle"></i>
									</button>
								</div>
							</div>
						</div>
  					</div>
  				</div>
  			</div>

  		</div>
  	</div>
  </div>


</div>