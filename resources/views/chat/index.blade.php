@extends('layout')

@section('content')
<div id="app" >

    <div class="column"  >

        <chat></chat>
    </div>
    <div class="column" style="background-color:cyan;opacity:0.5">

        <users></users>
    </div>
</div>
@endsection