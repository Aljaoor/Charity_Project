@extends('layouts.main')


@section('permissions')


<div class="row">
        <div class="pull-left">
            <h2>Edit New User</h2>

        </div>
    <div style="  position: absolute;
    top: 125px;
  right: 200px;
  font-size: 18px;">
            <a class="btn btn-primary" href="{{ route('users.index') }}" > Back</a>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>mobile:</strong>
            {!! Form::text('mobile', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>age:</strong>
            {!! Form::text('age', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Activate:</strong>
            <br>
            @if($user->is_active==1)
                <p style="color: #3ac060; font-size: 25px;">  the user account is active:  </p>
                <label style="color: #c9302c; font-size: 20px;"> Disable</label>

                {!! Form::radio('is_active',2,false,)!!}

                <label style="color: #3ac060; font-size: 20px;"> Activate </label>

                {!! Form::radio('is_active',1,true,)!!}


            @else
                <p style="font-size: 25px; color: #c9302c"> the user account is not active</p>
                <label style="color: #3ac060; font-size: 20px;"> Activate </label>

                {!! Form::radio('is_active',1,true )!!}
                <label style="color: #c9302c; font-size: 20px;"> Disable</label>

                {!! Form::radio('is_active',2,false,)!!}

            @endif

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-bottom: 15px;">
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
