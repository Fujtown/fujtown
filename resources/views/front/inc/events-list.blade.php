@foreach($events as $event)
<div class="event-card">
            <img src="{{ asset('assets/imgs/page/homepage3/water-safety.jpg') }}" alt="Water Safety Event" class="event-image">
            <div class="event-details">
                <h3 class="event-title">{{$event->trip_title}}</h3>
                <p class="event-date"><i class="fa fa-calendar"></i> Start Date: {{$event->trip_date}}  </p>
                <p class="event-date"><i class="fa fa-calendar"></i> End Date: {{$event->end_date}} </p>
                
                <a href="#" class="event-link">Read More »</a>
            </div>
        </div>

        @endforeach     