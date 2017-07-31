@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <div class="section">
                <h5>HR<span class="collapse_icon"><i class="material-icons">arrow_drop_up</i></span></h5>

                @if(count($hrdocs) > 0)
                    <ul class="collection">
                        @foreach ($hrdocs as $hrdoc)
                            <li class="collection-item"><span class="document-name"> {{ $hrdoc->name }}
                                    v{{$hrdoc->version}}</span>
                                @if(Auth::user()->id == $hrdoc->author or Auth::user()->role == 'System Admin')
                                    <span class="function-icons">
                                    <a href="{{ route('documentdelete', $hrdoc->id) }}" class="secondary-content"><i
                                                class="material-icons">delete</i></a>
                                        @if($hrdoc->active == 0)
                                            <a href="{{ route('documentactivate', $hrdoc->id) }}"
                                               class="secondary-content"><i class="material-icons">done</i></a>
                                        @else
                                            <a href="{{ route('documentactivate', $hrdoc->id) }}"
                                               class="secondary-content"><i class="material-icons">cancel</i></a>
                                        @endif
                                        <a href="{{ route('documentedit', $hrdoc->id) }}" class="secondary-content"><i
                                                    class="material-icons">mode_edit</i></a>
                                        @endif
                                        <a href="{{ $hrdoc->filePath."/".$hrdoc->name.$hrdoc->ext }}"
                                           class="secondary-content"><i class="material-icons">get_app</i></a>
                                    </span>
                                    <span class="clear"></span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No HR Documents.</span>
                @endif
            </div>
            <div class="divider"></div>
            <div class="section">
                <h5>Development<span class="collapse_icon"><i class="material-icons">arrow_drop_up</i></span></h5>
                @if(count($devdocs) > 0)
                    <ul class="collection">
                        @foreach ($devdocs as $devdoc)
                            <li class="collection-item"><span class="document-name"> {{ $devdoc->name }}
                                    v{{$devdoc->version}}</span>
                                <span class="function-icons">
                                @if(Auth::user()->id == $devdoc->author or Auth::user()->role == 'System Admin')
                                        <a href="{{ route('documentdelete', $devdoc->id) }}"
                                           class="secondary-content"><i
                                                    class="material-icons">delete</i></a>
                                        @if($devdoc->active == 0)
                                            <a href="{{ route('documentactivate', $devdoc->id) }}"
                                               class="secondary-content"><i class="material-icons">done</i></a>
                                        @else
                                            <a href="{{ route('documentactivate', $devdoc->id) }}"
                                               class="secondary-content"><i class="material-icons">cancel</i></a>
                                        @endif
                                        <a href="{{ route('documentedit', $devdoc->id) }}" class="secondary-content"><i
                                                    class="material-icons">mode_edit</i></a>
                                    @endif
                                    <a href="{{ $devdoc->filePath."/".$devdoc->name.$devdoc->ext }}"
                                       class="secondary-content"><i class="material-icons">get_app</i></a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No Development Documents.</span>
                @endif
            </div>
            <div class="divider"></div>
            <div class="section">
                <h5>Payroll<span class="collapse_icon"><i class="material-icons">arrow_drop_up</i></span></h5>
                @if(count($paydocs) > 0)
                    <ul class="collection">
                        @foreach ($paydocs as $paydoc)
                            <li class="collection-item"><span class="document-name"> {{ $paydoc->name }}
                                    v{{$paydoc->version}}</span>
                                <span class="function-icons">
                                @if(Auth::user()->id == $paydoc->author or Auth::user()->role == 'System Admin')
                                        <a href="{{ route('documentdelete', $paydoc->id) }}"
                                           class="secondary-content"><i
                                                    class="material-icons">delete</i></a>
                                        @if($paydoc->active == 0)
                                            <a href="{{ route('documentactivate', $paydoc->id) }}"
                                               class="secondary-content"><i class="material-icons">done</i></a>
                                        @else
                                            <a href="{{ route('documentactivate', $paydoc->id) }}"
                                               class="secondary-content"><i class="material-icons">cancel</i></a>
                                        @endif
                                        <a href="{{ route('documentedit', $paydoc->id) }}" class="secondary-content"><i
                                                    class="material-icons">mode_edit</i></a>
                                    @endif
                                    <a href="{{ $paydoc->filePath."/".$paydoc->name.$paydoc->ext }}"
                                       class="secondary-content"><i class="material-icons">get_app</i></a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No Payroll Documents.</span>
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
