@extends('layouts.auth-layout')

@section('content')
<p>
    <br><b style="text-transform: capitalize;">Hi {{ $details['name'] }}</b>,
    <br>
    <br>You can reset your password to your account ({{ $details['email'] }}) by clicking the link <b><a href="{{ $details['link'] }}" target="_blank">here</a></b>: 
    <br>
    <br>Please be reminded that you need update your password as soon as you have received this email.
    <br>
    <br>Thank you for subscribing and supoorting our <b>REACH app</b>.
    <br>
    <br>All the best!
    <br><i>REACH Team</i>
</p>

@endsection