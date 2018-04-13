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
		$events = getEvents();
		$orgs = getOrgs();
		
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
    
    dd( $event_organizers, $org_names);
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
    
    // dd($test, $org_names);
    // dd( $test, $false_names, $org_names);
    // dd(array_filter($test, function ($value) {return !$value;}), $org_names);
		
    // return 'Next user story testing...';
	}
	
	/**
	 * Display a list of organizations.
	 */
	public function showOrgs()
	{
    $orgs = getOrgs();
		
		$types = getOrgTypes( $orgs );
		
		// dd( $types );
		
		return view( 'orgs' , [ 'orgs' => $orgs ]);
	}
	
	/**
	 * Display a list of events.
	 */
	public function showEvents()
	{
		$events = getEvents();
		
		// Sort the events by date.
		usort( $events , 'compare');
		
		$months = getEventMonths( $events );
		
		if (isset($_GET['month'])) {
      $events = filterOnMonth( $events , $_GET['month']);
    }
		
		return view( 'events' , [ 'events' => $events,
		                          'months' => $months]);
	}
}
