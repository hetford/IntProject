@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="contentContainer col s12 m10 offset-m1 l8 offset-l2 z-depth-2">
            <h4>Add Document</h4>
            <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('documentupload') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col m8 s12">
                        <input placeholder="Document Name" id="documentName" name="documentName" type="text"
                               class="validate">
                    </div>
                    <div class="input-field col m4 s12">
                        <input placeholder="Version" id="documentVersion" name="documentVersion" type="text"
                               class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="category" id="category">
                            <option value="" class="placeholderText" disabled selected>Choose Category</option>
                            <option value="HR">HR</option>
                            <option value="Development">Development</option>
                            <option value="Payroll">Payroll</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" id="fileinput" name="fileinput">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Upload
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