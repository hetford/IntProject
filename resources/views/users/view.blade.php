@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <div class="section">
                <h5>Users<span class="collapse_icon"><i class="material-icons">arrow_drop_up</i></span></h5>

                @if(count($users) > 0)
                    <ul class="collection">
                        @foreach ($users as $user)
                            <li class="collection-item"><span class="userNameList"><strong>Name:</strong> {{ $user->name }}</span> <strong>Role:</strong> {{$user->role}}
                                    <a href="{{ route('sysadminuserdelete', $user->id) }}" class="secondary-content"><i class="material-icons">delete</i></a>
                                    <a href="{{ route('sysadminuseredit', $user->id) }}" class="secondary-content"><i class="material-icons">mode_edit</i></a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No Users in Database.</span>
                @endif
            </div>
            <div class="row">
                @if (session('status'))
                    <div class="success-block">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="help-block">
                        {{ session('error') }}
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
        </div>
    </div>
@endsection
