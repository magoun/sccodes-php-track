<?php
// Attempting to use Guzzle to send PATCH request to API
// Goal is to update organization names so that they match
// exactly to event host names.

// use GuzzleHttp\Client;

// $client = new Client([
//   // Base URI is used with relative requests
//   'base_uri' => 'http://httpbin.org',
//   // You can set any number of default request options.
//   'timeout'  => 2.0,
// ]);

/**
 * Add general org info for Greenville SC Makers @ Synergy Mill 
 */
function addMissingOrgs ($orgs) {
  $newOrg = new StdClass();
  $newOrg->title = "Greenville SC Makers @ Synergy Mill";
  $newOrg->field_organization_type = "Meetup Groups";
  
  $orgs[] = $newOrg;
  
  return $orgs;
}

/**
 * Transform organization names to match event hosts.
 */
function convertOrgNames ($orgs) {
  foreach ( $orgs as $org ):
    $title = $org->title;

    switch ($title) {
      case "HackGreenville":
        $title = "HackGreenville Community";
        break;
      case "GSP Developers Guild":
        $title = "Greenville Spartanburg Developers' Guild";
        break;
      case "Code For Greenville":
        $title = "Code for Greenville";
        break;
      case "Cocoaheads":
        $title = "Greenville Cocoaheads";
        break;
      case "Upstate Elixir":
        $title = "Upstate |> Elixir";
        break;
      case "Greenville SC WordPress Meetup Group":
        $title = "Greenville South Carolina WordPress Group";
        break;
      case "ACM - Association for Computing Machinery":
        $title = "ACM Greenville";
        break;
    }
    
    $org->title = $title;
  endforeach;
  
  return $orgs;
}

/**
 * Build a Google calendar url from an event object.
 */
function build_cal_url( $event )
{
  $event_time = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', 
  $event->time);
  $start_time = $event_time->format('Ymd\THis\Z');
  // Assume event is two hours long...
  $event_time->add(new DateInterval('PT2H'));
  $end_time = $event_time->format('Ymd\THis\Z');
  
  $location = '';
  
  if (property_exists($event, 'venue') && $event->venue != NULL ):
    $location .= $event->venue->name . ', ';
    $location .= $event->venue->address . ', ';
    $location .= $event->venue->city . ', ';
    $location .= $event->venue->state;
  endif;
  
  $calendar_url = "http://www.google.com/calendar/event?action=TEMPLATE&";
  $calendar_url .= 'text=' . urlencode($event->event_name) . '&';
  $calendar_url .= "dates=$start_time/$end_time&";
  $calendar_url .= 'details=' . urlencode( strip_tags( $event->description )) . '&';
  $calendar_url .= 'location=' . urlencode( $location ) . '&';
  $calendar_url .= "trp=false&";
  
  return $calendar_url;
}

/**
 * Return an array of unique organizaion types.
 */
function getOrgTypes( $orgs )
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

/**
 * Comparison function for sorting events by time.
 */
function compare( $a , $b ) 
{
	if ( $a->time == $b->time ) 
	{
		return 0;
	}
	
	return ( $a->time < $b->time ) ? -1 : 1;
}

/**
 * Return an array of months containing events.
 */
function getEventMonths( $events )
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

/**
 * Return only the events that occur in the given month.
 */
function filterOnMonth ( $events , $month ) {
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