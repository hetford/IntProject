@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <h4>Register</h4>
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required
                               autofocus placeholder="Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}"
                               placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                               required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Register User
                            <i class="material-icons right">note_add</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    @if (session('status'))
                        <div class="success-block">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><span class="help-block">{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
