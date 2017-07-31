@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <h4>Add Document</h4>
            @if(count($document) > 0)
                @foreach ($document as $doc)
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('documenteditsubmit',$doc->id) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col m8 s12">
                                <input placeholder="{{ $doc->name }}" id="documentName" name="documentName" type="text"
                                   class="validate" >
                            </div>
                            <div class="input-field col m4 s12">
                                <input placeholder="{{ $doc->version }}" id="documentVersion" name="documentVersion" type="text"
                                   class="validate">
                            </div>
                        </div>
                @endforeach
            @endif
                <div class="row">
                    <div class="input-field col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Update
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