<?php include('header.php'); ?>
<?php include('menuservice.php'); ?>

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<h1 class="app-page-title">Overview</h1>

			  <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3">Happy Nikah Service Admin Dashboard!</h3>
						 <div class="row gx-5 gy-3">
							<div class="col-12 col-lg-8">

								<div>Happynikah.com Meet your perfect partner from sites to "tie up together",<br>
									All Muslim community can find their suitable brides and grooms with thousands of profiles.</div>
							</div>
							<!--//col-->
							<div class="col-12 col-lg-3">
								<a class="btn app-btn-primary" href="<?php echo base_url() ?>../">
								    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
										<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
										<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
									</svg>Website</a>
							</div>
							<!--//col-->
						</div>
						<!--//row-->
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<!--//app-card-body-->

				</div>
				<!--//inner-->
			 </div>

		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->

	<?php include('footer.php'); ?>

	<!-- Charts JS -->
	<script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/index-charts.js"></script>

	</html>