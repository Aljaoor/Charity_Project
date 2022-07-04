@extends('website.layouts.main')
@section('content')

<form method="post" action="{{route('test')}}" >
    @csrf
    <input type="checkbox"  name="ch[]" value="11" data-valuetow="22">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox"  name="ch[]" value="22" data-valuetow="33">
    <label for="vehicle2"> I have a car</label><br>
    <input type="checkbox"  name="ch[]" value=33 data-valuetow="44">
    <label for="vehicle3"> I have a boat</label><br>

    <button type="submit">send</button>
</form>

@endsection
