<h1>This is test page</h1>
{{-- @php 
$name="yousef";
echo $name;
@endphp --}}
{{$name}}
<br>
@foreach ($books as $item)
    {{$item}} 
@endforeach