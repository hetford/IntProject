@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <div class="section">
                <h5>HR</h5>
                @if(count($hrdocs) > 0)
                    <ul class="collection">
                        @foreach ($hrdocs as $hrdoc)
                            <li class="collection-item">{{ $hrdoc->name }} v{{$hrdoc->version}}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No HR Documents.</span>
                @endif
            </div>
            <div class="divider"></div>
            <div class="section">
                <h5>Development</h5>
                @if(count($devdocs) > 0)
                    <ul class="collection">
                        @foreach ($devdocs as $devdoc)
                            <li class="collection-item">{{ $devdoc->name }} v{{$devdoc->version}}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="no-docs-block">No Development Documents.</span>
                @endif
            </div>
            <div class="divider"></div>
            <div class="section">
                <h5>Payroll</h5>
                @if(count($paydocs) > 0)
                    <ul class="collection">
                        @foreach ($paydocs as $paydoc)
                            <li class="collection-item">{{ $paydoc->name }} v{{$paydoc->version}}</li>
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
