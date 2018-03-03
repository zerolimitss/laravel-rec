@extends('layouts.admin')

@section('content')
    <table id="myTable" class="tablesorter">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Position</td>
                <td>Salary</td>
                <td>Date</td>
                <td>Boss</td>
                <td>Country</td>
            </tr>
        </thead>
        <tbody>
        @foreach($e as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->position}}</td>
                <td>{{$item->salary}}</td>
                <td>{{$item->date}}</td>
                <td>{{is_object($item->parent)?$item->parent->name:''}}</td>
                <td>{{$item->country->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function()
                {
                    $("#myTable").tablesorter();
                }
        );
    </script>
@endsection