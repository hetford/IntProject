@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h4>Login</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Email" id="email" type="email" name="email" class="validate">
                        <label for="email" data-error="Please enter an email address."
                               data-success="Valid email address."></label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Password" id="password" type="password" name="password" class="validate">
                    </div>
                    <div class="input-field col s12">
                        <input type="checkbox" id="RememberMe" name="RememberMe" {{ old('remember') ? 'checked' : '' }}>
                        <label for="RememberMe">Remember Me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action" id="loginButton">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="row">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection