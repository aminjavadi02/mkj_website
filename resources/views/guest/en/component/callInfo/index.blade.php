@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.callInfo.header')
<div class="callinfoContainer">
    <table class="content-table">
    <thead>
        <tr class="english">
        <th>name</th>
        <th>position</th>
        <th>phone number</th>
        </tr>
    </thead>
    <tbody>
        @foreach($callinfos as $callinfo)
        <tr class="english">
        <td>{{$callinfo['name_en']}}</td>
        <td>{{$callinfo['position_en']}}</td>
        <td>{{$callinfo['phone_number']}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection