<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
	/**
	 * Debug route - delete in production.
	 */
	public function debug()
	{
	  $event_url = 'https://nunes.online/api/gtc';
	  $org_url = 'https://data.openupstate.org/rest/organizations';
	  
		$event_data = file_get_contents( $event_url );
		$org_data = file_get_contents( $org_url );
		
		// Put the data into JSON format.
		$orgs = json_decode( $org_data );
		$events = json_decode( $event_data );
		
		$event_organizers = array();
		
    foreach ($events as $event):
      if ( !in_array( $event->group_name , $event_organizers )):
				$event_organizers[] = $event->group_name;
			endif;
    endforeach;
    
    $org_names = array();
    
    foreach ($orgs as $org):
      $org_names[] = $org->title;
    endforeach;
    
    // dd( $event_organizers, $org_names);
    // $event_organizers holds an array of unique groups hosting events
    // $org_names holds an array of known groups
    
    $test = array();
    $false_names = array();
    
    foreach ($event_organizers as $name):
      if ( in_array( $name , $org_names )):
				$test[$name] = true;
			else:
        $test[$name] = false;
			endif;
    endforeach;
    
    
    // dd( $test, $false_names, $org_names);
    dd($org_names, array_filter($test, function ($value) {return !$value;}));
		
    // return 'Next user story testing...';
	}
	
	/**
	 * Display a list of organizations.
	 */
	public function showOrgs()
	{
		$url = 'https://data.openupstate.org/rest/organizations';
		$data = file_get_contents( $url );
		
		// Put the data into JSON format.
		$json = json_decode( $data );
		
		$types = getOrgTypes( $json );
		
		// dd( $types );
		
		return view( 'orgs' , [ 'orgs' => $json ]);
	}
	
	/**
	 * Display a list of events.
	 */
	public function showEvents()
	{
		$url = 'https://nunes.online/api/gtc';
		$data = file_get_contents( $url );
		
		// Put the data into JSON format.
		$json = json_decode( $data );
		
		// Sort the events by date.
		// I have very little clue why this works...
		usort( $json , 'compare');
		
		$months = getEventMonths( $json );
		
		if (isset($_GET['month'])) {
      $json = filterOnMonth( $json , $_GET['month']);
    }
		
		return view( 'events' , [ 'events' => $json,
		                          'months' => $months]);
	}
}
