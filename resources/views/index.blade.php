@extends('layout')

@section('content')
<center>
    <h1 style="background-color:rgb(0,255,255);opacity:0.5">Click On The Screen</h1>
</center>

<div id="ground">

    @for ($i = 1; $i <25; $i++) 
    <div class="tile" id="{{ $i }}" 
    @if (in_array($i, $locs)) 
    style="background-color:rgb(0,255,255);opacity:0.5"
    @endif
    ></div>
@endfor


</div>

<script>
    const ground = document.querySelector("#ground");
    ground.addEventListener("click", selectLocation);

    function selectLocation(event) {
        const formData = new FormData();
        formData.append("loc", event.target.id);

        if (event.target.style.backgroundColor) {

            fetch("/delpoint", {
                method: "POST",
                body: formData,
            }).then((resp) => resp.json() ).then((data) => {
                console.log(data);
                event.target.style.backgroundColor = null;
                event.target.style.opacity = null;
            }).catch((err) => console.log(err));

        } else {

            fetch("/points", {
                method: "POST",
                body: formData,
            }).then((resp) => resp.json() ).then((data) => {
                console.log(data);
                event.target.style.backgroundColor = 'rgb(0,255,255)';
                event.target.style.opacity = 0.5;
            }).catch((err) => console.log(err));

        }
    }
</script>

@endsection