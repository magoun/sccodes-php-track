<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
	/**
	 * Display a list of events.
	 */
	public function showEvents()
	{
		$url = 'https://nunes.online/api/gtc';
		$data = file_get_contents( $url );
		
		// Put the data into JSON format.
		$json = json_decode( $data );
		
		// Put the data into a nested array format.
		// $array = json_decode( $data , true );
		
		// Sort the events by date.
		// I have very little clue why this works...
		usort( $json , [$this, 'compare']);

		return view( 'events' , [ 'events' => $json ]);
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
	 * Debug orgs - delete in production.
	 */
	public function debugEvents()
	{
		$url = 'https://nunes.online/api/gtc';
		$data = file_get_contents( $url );
		
		// Put the JSON into a nested array format.
		$json = json_decode( $data , true );
		dd( $json );
	}
	
	private function getEventMonths( $events )
	{
	  $result = array();
	  
	  foreach ( $events as $event )
	  {
	    $event_date = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', 
				              $event->time)->format();
								
	 //   if ( !in_array(  , $result ))
		// 	{
		// 		$result[] = $org->field_organization_type;
		// 	}
	  }
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
