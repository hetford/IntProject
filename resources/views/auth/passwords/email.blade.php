@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m8 offset-m2 z-depth-2">
            <h4>Password Reset</h4>
            <form role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Enter your email address." id="email" type="email" name="email"
                               class="validate">
                        <label for="email" data-error="Please enter an email address."
                               data-success="Valid email address."></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
