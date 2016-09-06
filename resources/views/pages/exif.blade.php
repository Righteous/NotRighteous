@extends('layouts.master')

@section('title', 'EXIF Remover')

@section('content')
    <!-- Check for validation errors -->
    <ul>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    </ul>
    <!-- Check for a flashed message 'response' -->
    @if(Session::has('response'))
        <div class="alert alert-info">
            {{Session::get('response')}}
        </div>
    @endif
    <!-- Form builder start -->
    {!! Form::open(array('route' => 'exif_store', 'class' => 'form', 'files' => true)) !!}
    <div class="flexcontainer">
        {!! Form::label('userfile', 'Select image file: ') !!}
        {!! Form::file('userfile', null, array('required')) !!}
        {!! Form::submit('Process',
          array('class'=>'btn btn-primary', 'name' => 'processbtn')) !!}
    </div>
    {!! Form::close() !!}
    <div class="flexcontainer">
        @if (Session::has('before'))
            <div class="container">
                <h1><U>Before: </U></h1><br>
                <p>{!! Session::get('before') !!}</p>
            </div>
        @endif
        @if (Session::has('after'))
            <div class="container">
                <h1><U>After: </U></h1><br>
                <p>{!! Session::get('after') !!}</p>
            </div>
        @endif
    </div>
@endsection