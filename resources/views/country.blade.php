@extends('layouts.app')
@section('content')
<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <table class="table table-sm border-b-2 border-blue-800 rounded">
        <thead class="">
        <tr>
            <th>Name</th>
            <th>TopLevelDomain</th>
            <th>Alpha2 Code</th>
            <th>Alpha3 Code</th>
            <th>Calling Codes</th>
            <th>Capital</th>
            <th>Region</th>
            <th>SubRegion</th>
            <th>Population</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{$country['name']}}</td>
                <td>{{$country['topLevelDomain'][0]}}</td>
                <td>{{$country['alpha2Code']}}</td>
                <td>{{$country['alpha3Code']}}</td>
                <td>{{$country['callingCodes'][0]}}</td>
                <td>{{$country['capital']}}</td>
                <td>{{$country['region']}}</td>
                <td>{{$country['subregion']}}</td>
                <td>{{$country['population']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    <span class="mb-4">{{$userss->links()}}</span>--}}
    <span class="mb-4">Current Time Is :{{\Carbon\Carbon::now()}}</span>
    {{--    <span class="my-5">Total users :{{count($userss)}}  </span>--}}
</div>
@endsection
