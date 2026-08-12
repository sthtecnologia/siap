<!--==============================
Custom
 ================================-->

<div class="col-12 mb-3 position-relative">


	<!--==============================
   Start Custom
  ================================-->

  <!-- Admin Revenue Chart -->
  <div class="card rounded mb-4">
  	<div class="card-body">
  		<h6 class="text-uppercase mb-3">Admin Revenue This Year</h6>
  		<canvas id="revenueChart" height="80"></canvas>
  	</div>
  </div>

  <!-- Statistics Cards -->
  <div class="row mb-4">
  	<div class="col-lg-3 col-md-6 mb-3">
  		<div class="card rounded text-center">
  			<div class="card-body">
  				<i class="bi bi-journal-text text-secondary fs-3"></i>
  				<h3 class="mt-2 mb-1">16</h3>
  				<p class="text-muted small mb-0">Number courses</p>
  			</div>
  		</div>
  	</div>
  	<div class="col-lg-3 col-md-6 mb-3">
  		<div class="card rounded text-center">
  			<div class="card-body">
  				<i class="bi bi-camera-video text-secondary fs-3"></i>
  				<h3 class="mt-2 mb-1">144</h3>
  				<p class="text-muted small mb-0">Number of lessons</p>
  			</div>
  		</div>
  	</div>
  	<div class="col-lg-3 col-md-6 mb-3">
  		<div class="card rounded text-center">
  			<div class="card-body">
  				<i class="bi bi-diagram-3 text-secondary fs-3"></i>
  				<h3 class="mt-2 mb-1">25</h3>
  				<p class="text-muted small mb-0">Number of enrolment</p>
  			</div>
  		</div>
  	</div>
  	<div class="col-lg-3 col-md-6 mb-3">
  		<div class="card rounded text-center">
  			<div class="card-body">
  				<i class="bi bi-people text-secondary fs-3"></i>
  				<h3 class="mt-2 mb-1">8</h3>
  				<p class="text-muted small mb-0">Number of student</p>
  			</div>
  		</div>
  	</div>
  </div>

  <!-- Course Overview and Requested Withdrawal -->
  <div class="row">
  	<div class="col-lg-4 mb-3">
  		<div class="card rounded">
  			<div class="card-body">
  				<h6 class="text-uppercase mb-4">Course Overview</h6>
  				<div class="text-center mb-4">
  					<canvas id="courseOverviewChart" width="200" height="200"></canvas>
  				</div>
  				<div class="row text-center">
  					<div class="col-6">
  						<i class="bi bi-arrow-up-right text-success"></i>
  						<h4 class="mb-0">16</h4>
  						<p class="text-muted small">Active courses</p>
  					</div>
  					<div class="col-6">
  						<i class="bi bi-arrow-down-right text-warning"></i>
  						<h4 class="mb-0">0</h4>
  						<p class="text-muted small">Pending courses</p>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="col-lg-8 mb-3">
  		<div class="card rounded">
  			<div class="card-body">
  				<h6 class="text-uppercase mb-4">Requested Withdrawal</h6>
  				<div class="d-flex justify-content-between align-items-center py-3 border-bottom">
  					<div>
  						<div class="fw-bold">Mathew Anderson</div>
  						<div class="text-muted small">Email: instructor@example.com</div>
  					</div>
  					<div class="text-end">
  						<div class="fw-bold">$255</div>
  						<div class="text-muted small">Requested withdrawal amount</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  	// Revenue Chart
  	const revenueCtx = document.getElementById('revenueChart').getContext('2d');
  	const revenueChart = new Chart(revenueCtx, {
  		type: 'line',
  		data: {
  			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
  			datasets: [{
  				label: 'Revenue',
  				data: [120, 90, 70, 60, 50, 45, 40, 38, 35, 33, 30, 28],
  				backgroundColor: 'rgba(99, 102, 241, 0.1)',
  				borderColor: 'rgba(99, 102, 241, 1)',
  				borderWidth: 2,
  				fill: true,
  				tension: 0.4
  			}]
  		},
  		options: {
  			responsive: true,
  			maintainAspectRatio: true,
  			plugins: {
  				legend: {
  					display: false
  				}
  			},
  			scales: {
  				y: {
  					beginAtZero: true,
  					grid: {
  						display: true,
  						color: 'rgba(0, 0, 0, 0.05)'
  					}
  				},
  				x: {
  					grid: {
  						display: false
  					}
  				}
  			}
  		}
  	});

  	// Course Overview Donut Chart
  	const courseCtx = document.getElementById('courseOverviewChart').getContext('2d');
  	const courseChart = new Chart(courseCtx, {
  		type: 'doughnut',
  		data: {
  			labels: ['Active courses', 'Pending courses'],
  			datasets: [{
  				data: [16, 0],
  				backgroundColor: ['rgba(16, 185, 129, 1)', 'rgba(251, 191, 36, 1)'],
  				borderWidth: 0
  			}]
  		},
  		options: {
  			responsive: true,
  			maintainAspectRatio: true,
  			plugins: {
  				legend: {
  					display: false
  				}
  			},
  			cutout: '75%'
  		}
  	});
  </script>

</div>