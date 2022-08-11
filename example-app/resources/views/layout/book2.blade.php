<?php
use Carbon\Carbon;
?>
@if(session('data1'))

<p style='display:none'> {{$p= session('data1') }}</p>
@foreach($p as $i)
{{$i->time_detail}}
<p style='display:none'>{{$timDetail = Carbon::parse($i->time_detail)}} roa</p>

<p>{{$a = $timDetail->format('H:i')}} roa</p>

{{$startTime = Carbon::parse($data->time_start)}}

@for ($i = 0; $i < 7; $i++)
<p style='display:none'>{{$plus = $startTime->addMinutes(30)}}</p>
<p style='display:none'>{{$plus->format('H:i')}}</p>
<p>{{$b = $plus->format('H:i')}} roaa1</p>
@if($a==$b)
<p> yaaas</p>
@endif
@endfor


<p>///////////////////////////////////////////</p>

@endforeach


@endif
