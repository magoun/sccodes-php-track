@extends('layouts.page')

@section('title', 'Events')

@section('content')
	<h1>Events</h1>
	<h3>Choose a month to filter</h3>
	
	<a href="<?= explode("?", $_SERVER['REQUEST_URI'])[0] ?>">
	  Clear filter
	</a>
	<br />
	
	@foreach( $months as $month )
	  <a href=<?= '?month=' . rawurlencode($month) ?>>
	    <?= $month ?>
    </a>
    <br />
	@endforeach
	
	<ul>
		@foreach( $events as $event )
			<li>
			  <strong>
			    {{ $event->event_name }} hosted by {{ $event->group_name }}
		    </strong>
		    
		    <?php
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
		    ?>
		    <a href=<?= $calendar_url; ?> target="_blank">
  				<ul>
  					<li><strong>Time:</strong> <?= DateTime::
  					  createFromFormat('Y-m-d\TH:i:s\Z', $event->time)
  					  ->format('g:i A, D j M y') ?></li>
  				</ul>
				</a>
			</li>
		@endforeach
	</ul>
@endsection