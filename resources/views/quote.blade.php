<!DOCTYPE html>
<html>
<head>
	<title>Laravel Bootstrap Datepicker</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container quote_div">
		<form action="#" method="post">
			<div class="row">
				<div class="col-md-8 form_details">
					<div class="shadow_box preview_box">
						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Blue Collar City</label>
									</div>
									<div>
										<?= $request['city'] ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Collection Date & Time</label>
									</div>
									<div>	
										<?= $request['col_date']." ".$request['col_time'] ?>
									</div>	                                                            
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>From </label>
									</div>
									<div>	
										<?= $request['fromplace'] ?>
									</div>                                                          
								</div>
							</div>
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>To</label>
									</div>
									<div>	
										<?= $request['toplace'] ?>
									</div>	                                                            
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Weight of Packages</label>
									</div>
									<div>	
										<?= $request['packweight'] ?>
									</div>	
								</div>
							</div>
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>No. Of Packages</label>
									</div>
									<div>	
										<?= $request['packnum'] ?>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Package Content</label>
									</div>
									<div>	
										<?= $request['packcont'] ?>
									</div>	
								</div>
							</div>
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Service Level</label>
									</div>
									<div>	
										<?= $request['servlev'] ?>
									</div>	

								</div>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Value of goods for insurance</label>
									</div>
									<div>	
										<?= $request['insurance'] ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 form_input">
								

								
							</div>
						</div>


						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Name</label>
									</div>
									<div>	
										<?= $request['custname'] ?>
									</div>	
								</div>
							</div>
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Email</label>
									</div>
									<div>	
										<?= $request['custemail'] ?>
									</div>	
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 form_input">
								<div class="input_name_value">
									<div>
										<label>Phone</label>
									</div>
									<div>	
										<?= $request['custphone'] ?>
									</div>	
								</div>
							</div>
							<div class="col-lg-6 form_input">
								

								
							</div>
						</div>


						<hr>





					</div>
				</div>
				<div class="col-md-4 quote_details">

					<div class="shadow_box total_box">
						<p class="title">Result</p>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Base Cost</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['basecost'] ?>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Additional Fee (time based)</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?php echo ($data['additionalweekend']+$data['additionalbusinesshours']) ?>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Additional Fee (day based)</b>

								
							</div>
							<div class="col-lg-6">
								

								$0
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Weight Cost</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['weightcost'] ?>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Package Extra Cost</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['packageextracost'] ?>
								
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Distance</b>

								
							</div>
							<div class="col-lg-6">
								

								<?= $data['distance'] ?> Miles
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Distance Cost</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['deliverycost'] ?>
								
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Insurance Cost</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['insurancecost'] ?>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Sub Total</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['subtotal'] ?>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Mileage Credit</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['mileagecredit'] ?>
								
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6">
								
								<b>Grand Total</b>

								
							</div>
							<div class="col-lg-6">
								

								$<?= $data['total'] ?>
								
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

	<style type="text/css">
		.shadow_box{
			-moz-box-shadow: 0 0 10px #999;
			-webkit-box-shadow: 0 0 10px #999;
			box-shadow: 0 0 10px #999;
			padding: 10px;
		}
		.form_input{
			padding: 20px;
		}
		.input_name_value{
			padding: 10px;
			border: 1px solid #eee;
			background: #fafafa;
		}
		p.title{
			font-size:2em;
			border-bottom: 2px solid #008afc;
			padding: 10px 10px 0px;
		}
		.total_box > div{
			padding: 10px;
		}
		.quote_div{
			padding: 20px;
		}

	</style>
</body>


</html>