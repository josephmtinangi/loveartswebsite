<a href="{{$event->url}}" class="an-event layout">
    <div class="image layout center-center">
        <img src="{{asset('images/events/'.$event->poster)}}" alt="">
    </div>

    <div class="text">
        @if(!isset($other_events))
            <?php
                $date = $event->date->year;
                $date_str = substr($date, strlen($date) - 2);
            ?>
            <div class="date">{{$event->date->format("j M \\'y")}}</div>
{{--            <div class="date">{{$event->date->toFormattedDateString()}}</div>--}}
        @endif

        <h2 class="name">
            {{$event->title}}
        </h2>

        @if(!isset($other_events))
            <div class="excerpt">
                <?php
                $len = 40;
                ?>
                {{str_limit($event->description, $len)}}
            </div>
        @endif

        <div class="next-arrow">
            More Details
        </div>
    </div>
</a>
