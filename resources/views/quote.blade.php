<!DOCTYPE html>
<html>
<head>
	<title>Laravel Bootstrap Datepicker</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> 
</head>

<body>
	<div class="container ">
		<form action="#" class="form-info" method="post" id="signinform" novalidate="novalidate">
			<div class="row">
				<div class="col-md-8">
					<div class="shadow_box preview_box">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Blue Collar City</label>

									<?= $request['city'] ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Collection Date & Time</label>
									<?= $request['col_date']." ".$request['col_time'] ?>                                                            
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>From </label>

									<?= $request['fromplace'] ?>                                                            
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>To</label>
									<?= $request['toplace'] ?>                                                            
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Weight of Packages</label>

									<?= $request['packweight'] ?>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. Of Packages</label>

									<?= $request['packnum'] ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Package Content</label>

									<?= $request['packcont'] ?>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Service Level</label>

									<?= $request['servlev'] ?>


									<span class="text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Value of goods for insurance</label>

									<?= $request['insurance'] ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Name</label>

									<?= $request['custname'] ?>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Email</label>

									<?= $request['custemail'] ?>

								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Phone</label>

									<?= $request['custphone'] ?>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

								</div>
							</div>
						</div>


						<hr>





					</div>
				</div>
				<div class="col-md-4">

					<div class="shadow_box total_box">
						<p class="title">Result</p>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Base Cost</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['basecost'] ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Additional Fee (time based)</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?php echo ($data['additionalweekend']+$data['additionalbusinesshours']) ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Additional Fee (day based)</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$0
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Weight Cost</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['weightcost'] ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Package Extra Cost</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['packageextracost'] ?>
								</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Distance</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									<?= $data['distance'] ?> Miles
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Distance Cost</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['deliverycost'] ?>
								</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Insurance Cost</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['insurancecost'] ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Sub Total</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['subtotal'] ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Mileage Credit</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['mileagecredit'] ?>
								</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Grand Total</label>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">

									$<?= $data['total'] ?>
								</div>
							</div>
						</div>

						<div class="container-button">
							<button id="submit" name="submit_btn" class="common_btn">Request Pickup</button>
						</div>

					</div>

				</div>
			</div>
		</form>
	</div>
</body>

</html>