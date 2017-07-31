@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <h4>Edit User</h4>
            @if(count($users)>0)
                @foreach($users as $user)
                    <form role="form" method="POST" action="{{ route('sysadminusereditsubmit',$user->id) }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name" value="{{ $user->name }}"
                                       required
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
                                <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}"
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
                                <select name="role" id="role" required class="validate">
                                    <option value="" class="placeholderText" disabled selected>Choose Role</option>
                                    <option value="User">User</option>
                                    <option value="Author">Author</option>
                                    <option value="System Admin">System Admin</option>
                                </select>
                                <label for="role" data-error="Please enter an email address."
                                       data-success="Valid email address."></label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Update User
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
                @endforeach
            @endif
        </div>
    </div>
@endsection
