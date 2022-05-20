@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.callInfo.header')
<div class="callinfoContainer">
    <table class="content-table">
    <thead>
        <tr class="persian">
        <th>نام</th>
        <th>سمت</th>
        <th>شماره تلفن</th>
        </tr>
    </thead>
    <tbody>
        @foreach($callinfos as $callinfo)
        <tr>
        <td class="persian">{{$callinfo['name_fa']}}</td>
        <td class="persian">{{$callinfo['position_fa']}}</td>
        <td>{{$callinfo['phone_number']}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection