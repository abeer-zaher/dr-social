@extends('layouts.app')

@section('content')

<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 70rem;">
  <div class="card-body">
    <h2 class="card-title">create gener</h2>
    <a class="btn btn-success" href="{{route('geners')}}">Show geners</a>
      
  </div>
</div>
    </div>
     
  </div>
  </div>
  <div class="container">
    <br>
  </div> 
  <div class="container">
  <div class="row">
    
    <div class="col">
    <div class="mb-3">
      <form action="{{route('geners.store')}}" method="POST" >
       
         <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
  <label for="formGroupExampleInput" class="form-label">Gener</label>
  <input type="text" class="form-control" name="name" >
</div>
 

 
<br>
<div class="form-group">
  <button class="btn btn-danger" type="submit">
    save 
</button>
</div>
</form>
    </div>
  </div>
  </div>
</div>
@endsection