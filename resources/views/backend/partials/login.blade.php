@extends('backend.layouts.master')
@section('content')
  <form class="login-form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        @if ($errors->has('email'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input id="password" type="password" class="form-control" name="password" required>
        </div>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <label class="checkbox">
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
          <span class="pull-right"> <a href="{{ route('password.request') }}"> Forgot Password?</a></span>
        </label>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
      </div>
    </form>
@endsection