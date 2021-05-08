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
		<form action="/calculate-quote" method="post">
			@csrf
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Choose Blue Collar City *</label>
						<select name="city" id="city" class="form-control" required>
							<option value="" selected="selected">Select</option>
							<option value="Reno">Reno</option>
							<option value="Palm Springs">Palm Springs</option>
							<option value="San Luisobispo">San Luisobispo</option>
							<option value="Fresno">Fresno</option>
							<option value="Grand Junction">Grand Junction</option>
							<option value="Aspen">Aspen</option>
						</select>	
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

						<label>Collection Date</label>
						<div class='input-group date' id="">
							<input type='text' class="form-control" name="col_date" value="2021-05-08" required/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div> 

					</div>

				</div>
				<div class="col-lg-6">
					<div class="form-group">

						<label>Collection Time</label>
						<div class='input-group date' id="">
							<input type='text' class="form-control" name="col_time" value="14:00 PM" required/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Pickup Address *</label>

						<input id="fromplace" class="form-control" name="fromplace" type="text" placeholder="" value="" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Delivery Address</label>
						<input id="toplace" class="form-control" name="toplace" type="text" placeholder="" value="" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Weight of Packages *</label>

						<input id="packweight" class="form-control" name="packweight" type="number" placeholder="LBS" max="100" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>No. Of Packages</label>
						<input id="packnum" class="form-control" name="packnum" type="number" placeholder="" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Package Content *</label>

						<textarea name="packcont" id="packcont" class="form-control" required></textarea>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Service Level</label>

						<select name="servlev" id="servlev" class="form-control" required>
							<option value="" selected="selected">Select</option>
							<option value="Same Day">Same Day</option>
							<option value="Rush">Rush</option>
							<option value="Next Day">Next Day</option>
							<option value="Scheduled">Scheduled</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Value of goods for insurance</label>

						<select name="insurance" id="insurance" class="form-control" required>
							<option value="" selected="selected">Select</option>
							<option value="0">$0 to $200</option>
							<option value="5">$201 to $400</option>
							<option value="10">$401 to $800</option>
							<option value="20">$801 to $1500</option>
							<option value="30">$1501 to $3000</option>
						</select>

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
						<label>Name *</label>

						<input id="custname" class="form-control" name="custname" type="text" placeholder="" required>

						<span class="text-danger"></span>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Email</label>
						<input id="custemail" class="form-control" name="custemail" type="email" placeholder="" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Phone *</label>

						<input id="custphone" class="form-control" name="custphone" type="text" placeholder="" required>

						<span class="text-danger"></span>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">

					</div>
				</div>
			</div>





			<div class="container-button">
				<button id="submit" name="submit_btn" class="common_btn">Estimate</button>
			</div>

		</form>
	</div>	

	<style type="text/css">
		div.date{
			position: relative
		}
	</style>

	<script>
		$('#col_date').datetimepicker({
			format: 'y-m-d'
		});
		$('#col_time').datetimepicker({  
			format: 'HH:mm a'
		});  
	</script> 

</body>

</html>