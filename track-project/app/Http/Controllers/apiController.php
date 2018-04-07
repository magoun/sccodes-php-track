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
	  $url = 'https://nunes.online/api/gtc';
		$data = file_get_contents( $url );
		
		// Put the data into JSON format.
		$json = json_decode( $data );
		
    // dd( $json );
    echo '<ul>';
    foreach ($json as $event):
      echo '<li>';
      var_dump($event->venue);
      echo '</li>';
    endforeach;
    echo '</ul>';
		
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
		
		// Put the data into a nested array format.
		// $array = json_decode( $data , true );
		
		$types = $this->getOrgTypes( $json );
		
		dd( $types );
		
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
		usort( $json , [$this, 'compare']);
		
		$months = $this->getEventMonths( $json );
		
		if (isset($_GET['month'])) {
      $json = $this->filterOnMonth( $json , $_GET['month']);
    }
		
		return view( 'events' , [ 'events' => $json,
		                          'months' => $months]);
	}
	
	private function filterOnMonth ( $events , $month ) {
	  $result = array();
	  
	  foreach ( $events as $event ) {
	    $event_month = \DateTime::createFromFormat('Y-m-d\TH:i:s\Z', 
				              $event->time)->format('F Y');
								
	    if ( $event_month == $month )
			{
				$result[] = $event;
			}
	  }
	  
	  return $result;
	}
	
	private function getEventMonths( $events )
	{
	  $result = array();
	  
	  foreach ( $events as $event )
	  {
	    $event_month = \DateTime::createFromFormat('Y-m-d\TH:i:s\Z', 
				              $event->time)->format('F Y');
								
	    if ( !in_array( $event_month , $result ))
			{
				$result[] = $event_month;
			}
	  }
	  
	  return $result;
	}
	
	private function getOrgTypes( $orgs )
	{
	  $result = array();
	  
	  foreach ( $orgs as $org ) 
		{
			if ( !in_array( $org->field_organization_type , $result ))
			{
				$result[] = $org->field_organization_type;
			}
		}
		
		return $result;
	}
	
	private static function compare( $a , $b ) 
	{
		if ( $a->time == $b->time ) 
		{ 
			return 0;
		}
		
		return ( $a->time < $b->time ) ? -1 : 1;
	}
}
