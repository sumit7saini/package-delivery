<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DateTime;

class PackageController extends Controller
{
    //
	public function calculateQuote(Request $request){
		$data = array();
		$data['city'] = $request->city;
		$data['col_date'] = $request->col_date;
		$data['col_time'] = $request->col_time;
		$data['fromplace'] = $request->fromplace;
		$data['toplace'] = $request->toplace;
		$data['packweight'] = $request->packweight;
		$data['packcont'] = $request->packcont;
		$data['packnum'] = $request->packnum;
		$data['servlev'] = $request->servlev;
		$data['insurance'] = $request->insurance;
		$data['custname'] = $request->custname;
		$data['custemail'] = $request->custemail;
		$data['custphone'] = $request->custphone;

		Session::put('request', $data);
		return redirect('/show-quote');
	}

	public function showQuote(Request $request){

		$request = Session::get('request');

		$data = array();
		$basecost = array(
			"Reno" => array(
				"Same Day" => 18,
				"Rush" => 25,
				"Next Day" => 15
			),
			"Palm Springs" => array(
				"Same Day" => 20,
				"Rush" => 30,
				"Next Day" => 17
			),
			"San Luisobispo" => array(
				"Same Day" => 20,
				"Rush" => 35,
				"Next Day" => 16
			),
			"Fresno" => array(
				"Same Day" => 20,
				"Rush" => 30,
				"Next Day" => 16
			),
			"Grand Junction" => array(
				"Same Day" => 20,
				"Rush" => 35,
				"Next Day" => 16
			),
			"Aspen" => array(
				"Same Day" => 20,
				"Rush" => 40,
				"Next Day" => 20
			)
		);
		$data['basecost'] = $basecost[$request['city']][$request['servlev']];

		$date =date("l", strtotime($request['col_date']));
		$data['additionalweekend'] = 0;
		if($date == 'Saturday' || $date == 'Sunday'){
			$data['additionalweekend'] = 10;
		}
		//Check for holidays
		//...code 
		$holidays = array('25-12', '04-07', '31-10', '24-12', '01-01', '31-12', '31-05', '06-09');
		$date =date("d-m", strtotime($request['col_date']));
		$data['additionalholidays'] = 0;
		if(in_array($date, $holidays)){
			$data['additionalholidays'] = 20;
		}


		$data['additionalbusinesshours'] = 0;
		if(strcmp('08:00 AM', $request['col_time']) > 0 || strcmp('17:00 PM', $request['col_time']) < 0){
			$data['additionalbusinesshours'] = 20;
		}

		$data['weightcost'] = 0;
		if($request['packweight'] > 20){
			$data['weightcost'] = ($request['packweight']-20)*0.25;
		}

		$data['packageextracost'] = 0;
		if($request['packnum'] > 2){
			$data['packageextracost'] = 10*($request['packnum']-2);
		}

		$data['insurancecost'] = $request['insurance'];


		$deliveryprices = array(
			"Same Day" => 1.20,
			"Rush" => 1.75,
			"Next Day" => 1.00
		);

		$deliveryrate = $deliveryprices[$request['servlev']];

		$from = $request['fromplace'];
		$to = $request['toplace'];

		$from = preg_replace('/\s+/', '+', $from);
		$to = preg_replace('/\s+/', '+', $to);

		$apikey = "AIzaSyC-8QsaDu4j7YbIRj05ebZoXvlB8RwQk5A";
		$distance1 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$request['city'].'&destinations='.$from.'&sensor=false&mode=driving&key='.$apikey);
		$distance1 = json_decode($distance1);
		$distance1 = $distance1->rows[0]->elements[0]->distance->value;
	
		$distance2 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$from.'&destinations='.$to.'&sensor=false&mode=driving&key='.$apikey);
		$distance2 = json_decode($distance2);
		$distance2 = $distance2->rows[0]->elements[0]->distance->value;

		$distance = $distance1 + $distance2;
		$distance = (int)($distance*0.000621371192);
		$data['distance'] = $distance;
		$data['distance1'] = (int)($distance1*0.000621371192);
		$data['distance2'] = (int)($distance2*0.000621371192);

		$data['deliverycost'] = 0;
		if($distance > 8){
			$data['deliverycost'] = $distance * $deliveryrate;
		}

		$data['subtotal'] = $data['insurancecost'] + $data['packageextracost'] + $data['weightcost'] + $data['additionalbusinesshours'] + $data['additionalweekend'] + $data['basecost'] + $data['deliverycost'];

		$data['mileagecredit'] = 0;
		if($distance > 8) {
			$service_level_cost = array(
				'Same Day' => 1.20,
				'Rush' => 1.75,
				'Next Day' => 1.00
			);
			$data['mileagecredit'] = 8*$service_level_cost[$request['servlev']];
		}

		$data['total'] = $data['subtotal'] - $data['mileagecredit'];
		return view('quote', ['data' => $data, 'request' => $request]);
	}
}
