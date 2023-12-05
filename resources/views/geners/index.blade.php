
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4"> All Geners</h1>
                <a class="btn btn-success" href="{{route('geners.create')}}">create gener</a>
</div>
</div>
<div class="row">
    @if($gener->count() >0)

    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr>
        <th scope="col">#</th>
        <th scope="col">Gener</th>


</tr>
</thead>
<tbody>
   @foreach($gener as $item)

   <tr>
    <th scope="row"> {{$item->gener_id}}</th>

<td>{{$item->name}}</td>
<td>

    <form action="{{route('geners.destroy', $item->gener_id)}}" method="POST" class="float-left">
    <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
    {{method_field('DELETE')}}
    <button type="button" class="btn btn-warning">delete</button>
</form>
    </td>

<td>


    <a href="{{route('geners.destroy',['id'=> $item->gener_id])}}"><i class="fas fa-trash-alt"></i></a>
</td>
</tr>
@endforeach
</tbody>
</div>
@else
<div class="alert alert-danger" role="alert">
No Tags
</div>
    @endif
</div>
</div>
 @endsection
