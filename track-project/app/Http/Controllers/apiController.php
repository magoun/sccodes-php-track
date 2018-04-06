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
		usort( $json , [$this, 'compare'] );

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
		
		$types = array();
		
		foreach ( $json as $org ) 
		{
			if ( !in_array( $org->field_organization_type , $types ))
			{
				$types[] = $org->field_organization_type;
			}
		}
		
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
	
	private static function compare( $a , $b ) 
	{
		if ( $a->time == $b->time ) 
		{ 
			return 0;
		}
		
		return ( $a->time < $b->time ) ? -1 : 1;
	}
}
