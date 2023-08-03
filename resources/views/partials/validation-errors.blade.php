@if ($errors->any())

<ul>
<div class="small mb-2">
@foreach ($errors->all() as  $error)
    <li class="text-danger">{{ $error }}</li>
@endforeach
</div>
</ul>
@endif