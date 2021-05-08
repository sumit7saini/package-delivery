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

		$data['additionalbusinesshours'] = 0;
		if(strtotime('08:00 am') < strtotime($request['col_time']) || strtotime('05:00 pm') > strtotime($request['col_time'])){
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
		$apikey = "AnjYOaE9Brg5VAJ1ddY8ZRW85FayBJwy1kD-N0I_-o42XWlWYXJgF6Lo2ERylLbq";
		$from = file_get_contents('http://dev.virtualearth.net/REST/v1/Locations?query='.$from.'&maxRes=1&key='.$apikey);
		$from = json_decode($from);
		$from = $from->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates;
		$to = file_get_contents('http://dev.virtualearth.net/REST/v1/Locations?query='.$to.'&maxRes=1&key='.$apikey);
		$to = json_decode($to);
		$to = $to->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates;
		$distance = file_get_contents('https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins='.implode(",",$from).'&destinations='.implode(",",$to).'&travelMode=driving&distanceUnit=mi&key='.$apikey);
		$distance = json_decode($distance);
		$distance = $distance->resourceSets[0]->resources[0]->results[0]->travelDistance;
		$data['distance'] = $distance;

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
