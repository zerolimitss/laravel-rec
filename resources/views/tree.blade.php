<ul class="inner">
    @foreach($employee[$boss] as $item)
        <li><a class="toggle" href="javascript:void(0);">{{$item['name']}} / {{$item['position']}} / {{date("d-m-Y",strtotime($item['date']))}}</a>
        @if(isset($employee[$item['id']]))
            @include('tree', ['employee' => $employee, 'boss' => $item['id']])
        @endif
        </li>
    @endforeach
</ul>