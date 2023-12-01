@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{$user->name}}</div>

                <div class="card-body">
                   <form action="{{route('admin.users.update' , $user)}}" method="POST">
                   <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
                   @foreach($roles as $role)
                   <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{$role->id}}">
                    <lable>{{$role->name}}</lable>
                   @endforeach
                   <button type="submit" class="btn btn-primary">
                    Update
</button>
                    {{method_field('PUT')}}
</form>

  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
