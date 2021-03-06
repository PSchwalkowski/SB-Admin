@extends('layouts.auth')

@section('content')

  <div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please Sign In</h3>
      </div>
      <div class="panel-body">
        {{ Form::open([
          'url' => url('/login'),
          'role' => 'form'
        ]) }}

					<div class="alert alert-danger {{ count($errors) ? '' : 'hidden' }}">
						<ul>
							@if ($errors->has('email'))
								<li>{{ $errors->first('email') }}</li>
							@endif
							@if ($errors->has('password'))
								<li>{{ $errors->first('password') }}</li>
							@endif
						</ul>
					</div>

          <fieldset>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
              {{ Form::email('email', old('email'), [
                'class' => 'form-control',
                'placeholder' => 'E-mail'
              ]) }}
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
              {{ Form::password('password', [
                'class' => 'form-control',
                'placeholder' => 'Password'
              ]) }}
            </div>

            {{ Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-block']) }}
          </fieldset>

        {{ Form::close() }}
      </div>
    </div>
  </div>

@endsection
@section('content2')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
