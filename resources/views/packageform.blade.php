<!DOCTYPE html>
<html>
<head>
	<title>Laravel Bootstrap Datepicker</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.0.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-8QsaDu4j7YbIRj05ebZoXvlB8RwQk5A&libraries=places&callback=initAutocomplete" async></script>

	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	<script>  
		$(function() {  
			$('#datetimepicker1').datetimepicker({
				format: 'DD-MM-YYYY'
			});
			$('#datetimepicker2').datetimepicker({
				format: 'HH:mm a'
			});  
		});  
	</script>
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">    
</head>

<body>
	<div class="container ">
		<form action="/calculate-quote" method="post">
			@csrf
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Choose Blue Collar City</label>
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
						<div class='input-group date' id="datetimepicker1">
							<input type='text' class="form-control" name="col_date" value="05-05-2021" required/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div> 

					</div>

				</div>
				<div class="col-lg-6">
					<div class="form-group">

						<label>Collection Time</label>
						<div class='input-group date' id="datetimepicker2">
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
						<label>Pickup Address</label>

						<input id="autocompletefrom" class="form-control" name="fromplace" type="text" placeholder="" value="" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Delivery Address</label>
						<input id="autocompleteto" class="form-control Autocomplete" name="toplace" type="text" placeholder="" value="" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Weight of Packages</label>

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
						<label>Package Content</label>

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
						<label>Name</label>

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
						<label>Phone</label>

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
		input{
			height: auto !important;
		}
	</style>

	<script>
		$('#col_date').datetimepicker({
			format: 'DD/MM/YYYY'
		});
		$('#col_time').datetimepicker({  
			format: 'HH:mm a'
		});  
		$(document).ready(function () {
			google.maps.event.addDomListener(window, 'load', initialize);
		});
		function initAutocomplete() {
			autocompletefrom = new google.maps.places.Autocomplete(
				document.getElementById('autocompletefrom'));
			autocompleteto = new google.maps.places.Autocomplete(
				document.getElementById('autocompleteto'));
		}
	</script> 

</body>

</html>
