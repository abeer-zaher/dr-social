@extends('layouts.app')
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Films</title>
</head>
<body>
 
 <div class="jumbotron container">
  
</div>
  
<div class="container">
  
  <div class="alert alert-primary" role="alert">
   
</div>
</div> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Film name</th>
      <th scope="col">Description</th>
      <th scope="col">Date show</th>
      <th scope="col">Director</th>
      <th scope="col">Prod company</th>
      <th scope="col">Cast</th>
      <th scope="col">photo</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i=0;
    @endphp
     @foreach ($films as $item) 
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->description }}</td>
      <td>{{ $item->dateshow }}</td>
      <td>{{ $item->director }}</td>
      <td>{{ $item->prodcompany }}</td>
      <td>{{ $item->cast }}</td>
      <td>{{ $item->photo }}</td>

      <td>
     

     </td>

    </tr>
    @endforeach
    
  </tbody>
</table>
  
    </div>

    <form action="{{ route('films.create')}}" method="POST">
          
          <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
          <a class="btn btn-success" href="{{ route('films.create')}}" >Create</a>
          </form>

  
</body>
</html>
 